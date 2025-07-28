<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\Terms;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        return view("dashboard.terms.add");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view(string $id)
    {
        $privacies =PrivacyPolicy::find($id);
        
        return view("dashboard.privacy.view", compact("privacies"));
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
        Terms::create($validate);
        return redirect()->route("terms.add")->with("success", "Terms and Conditions Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $terms = Terms::paginate(10);
        return view("dashboard.terms.show", compact("terms"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $terms = PrivacyPolicy::find($id);
        return view("dashboard.privacy.edit", compact("terms"));
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
       $privacyPolicy = PrivacyPolicy::find($id);
       $privacyPolicy->update($validate);
        return redirect()->route("privacy.show")->with("success", "Privacy Policy Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $privacy = PrivacyPolicy::find($id);
        $privacy->delete();
        return redirect()->route("privacy.show")->with("success", "Privacy Policy Deleted Successfully");
    }
}
