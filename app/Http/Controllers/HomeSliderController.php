<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\HomeSliderLanguage;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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
        $request->validate([
            'image' => 'required|mimes:jpeg,png', // Maksimum 2MB jpeg png
        ]);

        $slider = new HomeSlider();

        if ($request->hasFile('image')) {
            $slider = new HomeSlider();
            $hashname = $request->file('image')->hashName();
            $request->file('image')->storeAs('/uploads/sliders', $hashname, 'public');
            $slider->image = $hashname;
            $slider->save();
            return redirect()
                ->back()
                ->with('success', 'Banner şəkli yükləndi aktiv olmayan bannerlər səhifəsinə gedin.');
        }

        return redirect()
            ->back()
            ->with('error', 'Fayl yüklnməsində xəta baş verdi.');
    }

    public function sliderLang(Request $request)
    {
        $request->validate([
            'lang' => 'required',
            'slider_id' => 'required',
            'editor_content' => 'required|min:10|max:5000',
        ]);

        $sliderLang = new HomeSliderLanguage();
        $sliderLang->home_slider_id = $request->slider_id;
        $sliderLang->lang = $request->lang;
        $sliderLang->text = $request->editor_content;
        $sliderLang->save();
        return redirect()->back()->with("success","Bannerə yazı əlavə olundu.");
    }

    public function EditsliderLang(Request $request)
    {
        $sliderId = $request->slider_id;
        $sliderLang = HomeSliderLanguage::where('home_slider_id', $sliderId)
            ->where('lang', $request->lang)
            ->first();

        if ($sliderLang) {
            $sliderLang->text = $request->editor_content;
            if(empty($request->editor_content)){
                $sliderLang->text = '';
            }
            $sliderLang->save();
            return redirect()->back()->with('success',"Banner güncəlləndi.");
        }

        return redirect()->back()->with('error',"Banner güncəllənmədə xəta baş verdi.");
    }

    public function sliderLangEdit($sliderId, $lang)
    {
        $slider = HomeSlider::with(['languages' => function($query) use ($lang) {
            $query->where('lang', $lang);
        }])
        ->find($sliderId);

        $lang = Language::where("lang",$lang)->first();

        if ($slider) {
            return response()->json(['text' => $slider->languages[0]->text, 'lang' => $lang]);
        }

        return response()->json(['text' => '', 'lang' => '']);
    }


    public function sliderLangfind($lang){
        $language = Language::where('lang', $lang)->first();
        return response()->json(['lang' => $language]);

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
            if ($sliderLanguages) {
                $sliderLanguages->delete();
            }
            return redirect()
                ->back()
                ->with('success', 'Slider  silindi.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Slider Tapılmadı.');
        }
    }
}
