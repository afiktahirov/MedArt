<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ticket_info;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'p_phone' => 'required|digits_between:7,12',
            'select-department' => 'required',
            'select-doctor' => 'required',
            'p_name' => 'required|max:255',
        ]);

        // Doğrulama başarılıysa veritabanına kayıt işlemini gerçekleştirin
        $department = $request->input("select-department");
        $doctor = $request->input("select-doctor");
        $p_name = $request->input("p_name");
        $p_phone = $request->input("p_phone");

        $ticket = new Ticket();
        $ticket->name_patient = $p_name;
        $ticket->patient_phone = $p_phone;
        $ticket->doctor = $doctor;
        $ticket->department = $department;
        $ticket->save();

        return redirect()->back()->with("success", "Müraciət qəbul olundu tezliklə sizinlə əlaqə saxlanılıcaq");
    }

    public function ticket_info(Request $request)
    {
        $request->validate([
          "username" =>"required|min:3|max:12",
          "useremail"=>"required|email",
          "usersubject"=>"required|min:3|max:30",
          "usermessage"=>"required|min:20|max:15000"
        ]);

        $ticket_info = new ticket_info();

        $ticket_info->username = $request->username;
        $ticket_info->useremail = $request->useremail;
        $ticket_info->usersubject = $request->usersubject;
        $ticket_info->usermessage = $request->usermessage;

        $ticket_info->save();

        return redirect()->back()->with("success","İsmarıcınız göndərildi.");

    }
    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
