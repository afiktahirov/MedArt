<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\department_icon;
use Illuminate\Http\Request;

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
       if($request->hasFile('image')){

          $department_icon = new department_icon();

          $hashname = $request->file('image')->hashName();
          $request->file('image')->storeAs('/uploads/depart_icon',$hashname,"public");
          $department_icon->icon = $hashname;
          $department_icon->save();

           return redirect()
           ->back()
           ->with("success","Yeni şöbə  yaradıldı.");
       }

       return redirect()
       ->back()
       ->with("error","Xeta bas verdi");
    }

    public function department_text(Request $request){

        $department = new Department();

        $department->department_icon_id = $request->department_id;
        $department->name = $request->department_name;
        $department->lang = $request->lang;
        $department->info = $request->department_info;

        $department->save();

        return redirect()
        ->back()
        ->with("success","Şöbə güncəlləndi.");


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
    public function destroy(Department $department)
    {
        //
    }
}
