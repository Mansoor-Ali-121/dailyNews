<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.ContactUs.add');
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject'=> 'required|string|max:255',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);
        ContactUs::create($validatedData);
        return redirect()->route('contact.add')->with('success','Thank you for contacting us. We will get back to you soon.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $contacts = ContactUs::all();
        return view('dashboard.ContactUs.show', compact('contacts'));
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
