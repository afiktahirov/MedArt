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

       $request->validate([
        "lang" =>"required",
        "department_name"=>"required|min:3|max:30",
        "department_info"=>"required|min:10|max:255",
        "image"=>"required|file|max:2048" //2MB
       ]);

       if($request->hasFile('image')){
          $lang = $request->lang;
          $department_name = $request->department_name;
          $department_info = $request->department_info;

          $department_icon = new department_icon();

          $hashname = $request->file('image')->hashName();
          $request->file('image')->storeAs('/uploads/depart_icon',$hashname,"public");
          $department_icon->icon = $hashname;
          $department_icon->save();

          $department = new Department();

          $department->name = $department_name;
          $department->image_id = $department_icon->id;
          $department->info = $department_info;
          $department->lang = $lang;

          $department->save();
       }


       return redirect()
           ->back()
           ->with("success","Yeni şöbə  yaradıldı.");
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
