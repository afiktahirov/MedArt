<?php

namespace App\Http\Controllers;

use App\Models\department_icon;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // All pages view index
    public function homeIndex()
    {
        $lang = app()->getLocale();
        $sliders = HomeSlider::where("status",1)->with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();

        $departments = department_icon::with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();


        return view('home.index',compact("sliders","departments"));



    }
    public function aboutIndex()
    {
        $lang = app()->getLocale();
        $sliders = HomeSlider::where("status",1)->with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();
        return view('aboute.index',compact("sliders"));
    }
    public function servicesIndex()
    {
        return view('services.index');
    }
    public function newsIndex()
    {
        return view('news.index');
    }

    public function contactIndex()
    {
        return view('contact.index');
    }
    //    All pages view index end
}
