<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\department_icon;
use App\Models\Doctor;
use App\Models\HomeSlider;
use App\Models\Language;
use App\Models\News;
use App\Models\Testimonials;
use App\Models\Ticket;
use App\Models\ticket_info;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()
            ->withErrors([
                'email' => 'Məlumatlar Yanlışdır !',
            ])
            ->onlyInput('email');
    }

    public function dashboard()
    {
        $tickets = Ticket::latest()->take(3)->get();
        $tickets_info = ticket_info::latest()->take(3)->get();

        $lang = request()->lang ? request()->lang : 'az';

        $departments = department_icon::with([
            'languages' => function ($query) use ($lang) {
                return $query->where('lang', $lang);
            },
        ])->get();

        $doctors = Doctor::all();
        return view('admin.partials.panel', compact('tickets','departments','doctors',"tickets_info"));
    }


    public function homeControl(Request $request)
    {
        $lang = request()->lang ? request()->lang : 'az';
        $languages = languages();

        $departments = department_icon::with([
            'languages' => function ($query) use ($lang) {
                return $query->where('lang', $lang);
            },
        ])->get();

        $slidersActive = HomeSlider::where('status', 1)
            ->with([
                'languages' => function ($query) use ($lang) {
                    return $query->where('lang', $lang);
                },
            ])
            ->get();

        $sliderId = $request->sliderId;
        $sliderLang = null;
        if (isset($sliderId)) {
            $sliderId = $request->sliderId;
            $sliderLang = HomeSlider::where('home_slider_id', $sliderId)
                ->where('lang', $request->lang)
                ->first();
        }
        return view('admin.partials.dashboard', compact('languages', 'slidersActive', 'sliderLang', 'departments'));
    }

    public function testimonialsPages()
    {
        $lang = request()->lang ? request()->lang : 'az';
        $news = News::with([
            'languages' => function ($query) use ($lang) {
                return $query->where('lang', $lang);
            },
        ])->get();

        $testimonials = Testimonials::all();
        return view('admin.partials.testimonialsPages', compact('testimonials', 'news'));
    }

    public function shoup()
    {
        return view('admin.partials.shoup');
    }
    /**
     * Show the form for creating a new resource.
     */

    public function slider_d()
    {
        $lang = request()->lang ? request()->lang : 'az';
        $languages = languages();
        $slidersDeactive = HomeSlider::where('status', 0)
            ->with([
                'languages' => function ($query) use ($lang) {
                    return $query->where('lang', $lang);
                },
            ])
            ->get();
        return view('admin.partials.dslider', compact('slidersDeactive', 'languages'));
    }

    public function slider_d_active(Request $request)
    {
        $sliderId = $request->slider_id;

        $slider = HomeSlider::find($sliderId);
        if ($slider) {
            $slider->status = 1;
            $slider->save();
            return redirect()
                ->back()
                ->with('success', 'Banner aktiv edildi.');
        }

        return redirect()
            ->back()
            ->with('error', 'Banner aktiv olunmadı.');
    }

    public function slider_d_deactive(Request $request)
    {
        $sliderId = $request->slider_id;
        $slider = HomeSlider::find($sliderId);
        if ($slider) {
            $slider->status = 0;
            $slider->save();
            return redirect()
                ->back()
                ->with('success', 'Banner deaktiv edildi.');
        }
        return redirect()
            ->back()
            ->with('error', 'Banner deaktiv olunmadı.');
    }

    public function setDarkMode($value)
    {
        Cache::put('darkMode', $value, null);
    }

    public function getDarkMode()
    {
        $checked = Cache::get('darkMode');
        if ($checked) {
            return true;
        } else {
            return false;
        }
    }

    public function toggleDarkMode()
    {
        $darkMode = !$this->getDarkMode();
        $this->setDarkMode($darkMode);

        return response()->json(['dark_mode' => $darkMode]);
    }

    public function test_tiny()
    {
        return view('admin.partials.tiny_test');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getDoctors($departmentId){
        $doctors = Doctor::where('department_id',$departmentId)->get();
        return response()->json($doctors);
    }
}
