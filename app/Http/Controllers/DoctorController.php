<?php

namespace App\Http\Controllers;

use App\Models\department_icon;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = department_icon::all();
        return view("admin.partials.doctor",compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = [
        'namesurname' => 'required|string|max:255',
        'wage' => 'required|numeric',
        'age' => 'required|integer',
        'department' => 'required|exists:departments,id',
        'position' => 'required|string|max:255',
        'experience' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ];


    $this->validate($request, $rules);

    $doctor = new Doctor();
    $doctor->name = $request->input('namesurname');
    $doctor->wage = $request->input('wage');
    $doctor->age = $request->input('age');
    $doctor->department_id = $request->input('department');
    $doctor->position = $request->input('position');
    $doctor->experience = $request->input('experience');

    $image = $request->file('image');
    $hashName = $image->hashName();
    $image->storeAs('uploads/doctors', $hashName, 'public');
    $doctor->photo = $hashName;

    $doctor->save();

    return redirect()->back()->with("success", "Həkim əlavə olundu.");
}


    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
