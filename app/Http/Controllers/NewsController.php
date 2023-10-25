<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsLanguages;
use Illuminate\Http\Request;

class NewsController extends Controller
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
              'image'=>'required|mimes:png,jpg,webp',
              'author'=>'required|min:3|max:20',
        ]);
        $news = new News();

        $hashname = $request->file("image")->hashName();
        $request->file("image")->storeAs('uploads/news',$hashname,'public');

        $news->image = $hashname;
        $news->author = $request->author;
        $news->date = now();
        $news->save();

        return redirect()->back()->with("success","Yenilik şəkli əlavə olundu.");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $newsId = $request->id;

        $news = News::find($newsId);

        if ($news) {
            $newsLang = NewsLanguages::where('news_id', $newsId)->get();

            foreach ($newsLang as $lang) {
                $lang->delete();
            }

            $news->delete();

            return redirect()
                ->back()
                ->with('success', 'Yenilik silindi.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Yenilik tapılmadı.');
        }
    }
}
