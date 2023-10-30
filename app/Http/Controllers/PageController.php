<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\department_icon;
use App\Models\Doctor;
use App\Models\HomeSlider;
use App\Models\News;
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

        $news = News::with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();


        $doctors = Doctor::all();

        return view('home.index',compact("sliders","departments","news","doctors"));



    }
    public function aboutIndex()
    {
        $lang = app()->getLocale();
        $sliders = HomeSlider::where("status",1)->with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();
        $departments = department_icon::with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();

        $doctors = Doctor::all();

        return view('aboute.index',compact("sliders","doctors","departments"));
    }
    public function servicesIndex()
    {
        $lang = app()->getLocale();

        $departments = department_icon::with(["languages"=>function ($query) use ($lang){
            return $query->where("lang",$lang);
        }])->get();
        return view('services.index',compact("departments"));
    }
    public function newsIndex()
    {
        return view('news.index');
    }

    public function contactIndex()
    {
        return view('contact.index');
    }
}
