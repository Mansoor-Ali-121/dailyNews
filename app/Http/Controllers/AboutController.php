<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        return view("dashboard.AboutUs.add");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view(string $id)
    {
        $terms =About::find($id);
        
        return view("dashboard.terms.view", compact("terms"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "language" => "required|in:en,ur",
            "content" => "required|string",
            "status" => "required|in:active,inactive",
        ]);
        About::create($validate);
        return redirect()->route("about.show")->with("success", "About Us Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $about = About::paginate(10);
        return view("dashboard.AboutUs.show", compact("about"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::find($id);
        return view("dashboard.AboutUs.edit", compact("about"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "language" => "required|in:en,ur",
            "content" => "required|string",
            "status" => "required|in:active,inactive",
        ]);
       $about = About::find($id);
       $about->update($validate);
        return redirect()->route("about.show")->with("success", "About Us Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $terms = About::find($id);
        $terms->delete();
        return redirect()->route("terms.show")->with("success", "Terms and Conditions Deleted Successfully");
    }
}
