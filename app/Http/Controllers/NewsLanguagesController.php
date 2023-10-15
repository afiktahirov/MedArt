<?php

namespace App\Http\Controllers;

use App\Models\NewsLanguages;
use Illuminate\Http\Request;

class NewsLanguagesController extends Controller
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
        $newsLanguages = new NewsLanguages();
        $newsLanguages->news_id = $request->news_id;
        $newsLanguages->name = $request->news_name;
        $newsLanguages->info = $request->news_info;
        $newsLanguages->lang = $request->lang;

        $newsLanguages->save();

        return redirect()->back()->with("success","Yeniliye yazi elave olundu");
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsLanguages $newsLanguages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsLanguages $newsLanguages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsLanguages $newsLanguages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLanguages $newsLanguages)
    {
        //
    }
}
