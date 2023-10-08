<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
         "username"=>"required|min:3|max:30",
         "user_comment"=>"required",
       ]);

       if($request->hasFile("image")){

        $testimonials = new Testimonials();
        $testimonials->user_name = $request->username;
        $testimonials->user_comment = $request->user_comment;
        $testimonials->user_image = $request->user_image;

        $hashname = $request->file("image")->hashName();
        $request->file("image")->storeAs("uploads/testimonials",$hashname,"public");
        $testimonials->user_image = $hashname;
        $testimonials->save();

        return redirect()->back()->with("success","Rey əlavə olundu.");

       }
       else{
          return redirect()->back()->with("error","Xeta bas verdi");
       }

    }


    /**
     * Display the specified resource.
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonials $testimonials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonials $testimonials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $testimonialId = $request->id;
        if(!$testimonialId){
           redirect()->back()->with("error","Xeta");
        }

        $testimonial = Testimonials::find($testimonialId);
        $testimonial->delete();
        return redirect()->back()->with("success","Rəy silindi.");

    }
}
