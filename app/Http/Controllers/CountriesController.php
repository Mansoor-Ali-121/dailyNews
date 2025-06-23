<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.countries.add');
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
            'country_name' => 'required|string|max:255|unique:countries,country_name',
            'country_code' => 'nullable|string|max:3|unique:countries,country_code',
            'country_slug' => [
                'required',
                'string',
                'max:255',
                'unique:countries,country_slug',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],
        ]);
        Country::create($validatedData);
        return redirect()->route('country.show')->with('success', 'Country added susseccfully');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {

        $countries = Country::paginate(3);
        return view('dashboard.countries.show', compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        return view('dashboard.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255|',
            'country_code' => 'nullable|string|max:3|',
            'country_status' => [
                'required',
                'string',
                'in:active,inactive',
            ],
            'country_slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],
        ]);
        $Country = Country::findOrFail($id);
        $Country->update($validatedData);
        return redirect()->route('country.show')->with('success', 'Country updated susseccfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);

Cities::where('country_id',$id)->delete();

        $country->delete();
        return redirect()->route('country.show')->with('success', 'Country deleted susseccfully');
    }
}
