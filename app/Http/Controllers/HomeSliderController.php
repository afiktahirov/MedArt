<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\HomeSliderLanguage;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
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

        // is qalib bi dene sekil gonderilecek
        $request->validate([
           "title"=>"required|min:6|max:255",
           "text"=>"required|min:12|max:50000",
        ]);

        $slider = new HomeSlider();
        $hashname = $request->file("image")->hashName();
        $request->file("image")->storeAs("/uploads/sliders",$hashname,"public");
        $slider->image = $hashname;
        $slider->save();
        return redirect()->back();
    }

    public function sliderLang( Request $request){

        $sliderLang = new HomeSliderLanguage();
        $sliderLang->home_slider_id = $request->slider_id;
        $sliderLang->lang =  $request->lang;
        $sliderLang->title = $request->title;
        $sliderLang->text = $request->text;
        $sliderLang->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $sliderId = $request->id;

        $slider = HomeSlider::find($sliderId);
        $sliderLanguages = HomeSliderLanguage::find($sliderId);

        if ($slider) {
            $slider->delete();
            if($sliderLanguages){
                $sliderLanguages->delete();
            }
            return redirect()->back()->with('success', 'Slider  silindi.');
        } else {
            return redirect()->back()->with('error', 'Slider Tapılmadı.');
        }
    }
}
