<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Country;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('country_name')->get();
        // Pass the countries to the view
        return view('dashboard.cities.add', compact('countries'));
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
            'country_id' => 'required|numeric|exists:countries,id',
            'city_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255|unique:cities,zip_code',
            'city_slug' => 'required|string|max:255|unique:cities,city_slug',
            // Note: city_slug is not here if you're generating it internally and not relying on user input for it
        ]);
        Cities::create($validatedData);
        return redirect()->route('city.show')->with('success', 'City added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Eager load the 'country' relationship when fetching cities

        $cities = Cities::with('country')
        ->Paginate(3);
        $countries = Country::all();

        return view('dashboard.cities.show', compact('cities', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = Cities::find($id);
        $countries = Country::all();
        return view('dashboard.cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'country_id' => 'required|numeric|exists:countries,id',
            'city_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'city_slug' => 'required|string|max:255',
            'city_status' => 'required|string|in:inactive,active',
        ]);

        // 2. Find the existing city record by its ID
        // THIS IS THE CRUCIAL PART THAT REPLACES THE STATIC CALL
        $city = Cities::findOrFail($id); // Using 'City' (singular) as is common for model names

        // 3. Update the city's attributes with the validated data
        $city->country_id = $validatedData['country_id'];
        $city->city_name = $validatedData['city_name'];
        $city->zip_code = $validatedData['zip_code'];
        $city->city_slug = $validatedData['city_slug'];
        $city->city_status = $validatedData['city_status'];

        // 4. Save the changes to the database
        $city->save(); // Call save() on the retrieved $city object

        // 5. Redirect after successful update
        return redirect()->route('city.show')->with('success', 'City updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $city = Cities::find($id);
        $city->delete();
        return redirect()->route('city.show')->with('success', 'City deleted successfully!');
    }
}
