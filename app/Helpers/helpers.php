<?php

use App\Models\Language;
use Illuminate\Support\Facades\Request;

if (!function_exists('changeLanguage')) {
    function changeLanguage($locale)
    {
        $currentLocale = app()->getLocale();
        $newUrl = preg_replace('/' . $currentLocale . '/',  $locale, Request::fullUrl(), 1);
        return $newUrl;
    }
}

if (!function_exists('localized_url')) {
    function localized_url($path)
    {
        $currentLocale = app()->getLocale();
        return url('/' . $currentLocale . '/' . ltrim($path, '/'));
    }
}

if (!function_exists('languages')) {
    function languages()
    {
        $languages = Language::all();
        return $languages;
    }
}
