<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\department_icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Language;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $department_icon = new department_icon();

            $hashname = $request->file('image')->hashName();
            $request->file('image')->storeAs('/uploads/depart_icon', $hashname, 'public');
            $department_icon->icon = $hashname;
            $department_icon->save();

            return redirect()
                ->back()
                ->with('success', 'Yeni şöbə  yaradıldı.');
        }

        return redirect()
            ->back()
            ->with('error', 'Xeta bas verdi');
    }

    public function department_text(Request $request)
    {
        $request->validate([
            "department_name" => "required|min:3|max:50",
            "lang" => "required",
            "department_info" => "required|max:5000", // Daha makul bir sınırlama
        ]);

        $department = new Department();

        $department->department_icon_id = $request->department_id;
        $department->name = $request->department_name;
        $department->lang = $request->lang;
        $department->info = htmlspecialchars($request->department_info, ENT_QUOTES, 'UTF-8');

        $department->save();

        return redirect()
            ->back()
            ->with('success', 'Şöbə güncəlləndi.');
    }


    public function sliderLangfind($lang)
    {
        $language = Language::where('lang', $lang)->first();
        return response()->json(['lang' => $language]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $departmentId = $request->id;

        $department = department_icon::find($departmentId);

        if ($department) {
            $departmentLang = Department::where('department_icon_id', $departmentId)->get();

            foreach ($departmentLang as $lang) {
                $lang->delete();
            }

            $department->delete();

            return redirect()
                ->back()
                ->with('success', 'Şöbə silindi.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Şöbə tapılmadı.');
        }
    }
}
