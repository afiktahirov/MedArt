<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Language;
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
            return redirect()->route('admin');
        }
        return back()
            ->withErrors([
                'email' => 'Məlumatlar Yanlışdır !',
            ])
            ->onlyInput('email');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        $lang = request()->lang ? request()->lang : 'az';
        $languages = languages();
        $slidersActive = HomeSlider::where('status', 1)
            ->with([
                'languages' => function ($query) use ($lang) {
                    return $query->where('lang', $lang);
                },
            ])
            ->get();
        $slidersDeactive = HomeSlider::where('status', 0)
            ->with([
                'languages' => function ($query) use ($lang) {
                    return $query->where('lang', $lang);
                },
            ])
            ->get();
        return view('admin.partials.dashboard', compact('languages', 'slidersActive', 'slidersDeactive'));
    }

    public function settingsPages(){
       return view("admin.partials.settings");
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
        }

        return redirect()->back();
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
}
