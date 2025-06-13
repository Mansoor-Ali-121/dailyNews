<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.add');
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
           'email' => [
            'required',     // Ensures the field is not empty.
            'string',       // Ensures the input is a string.
            'email:rfc,dns',// Validates email format according to RFC 5322.
                            // 'rfc' ensures strict adherence to the standard.
                            // 'dns' checks if the domain has a valid DNS record (MX or A).
            'max:255',      
            'unique:users', 
        ],
            'password' => 'required|string|min:8',
            'user_type' => 'required|string|in:admin,editor,author,rewiewer',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_slug' => 'required|string|max:255',
        ]);
        // image upload
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $validated['user_image'] = $imageName;
        }
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect()->route('user.show')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::all();
        return view('dashboard.users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'user_type' => 'required|string|in:admin,editor,author,rewiewer',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_slug' => 'nullable|string|max:255',
        ]);
        // 2. Handle User Image Upload
        if ($request->hasFile('user_image')) {
            // Delete old image if it exists
            if ($user->user_image && file_exists(public_path('images/users/' . $user->user_image))) {
                unlink(public_path('images/users/' . $user->user_image));
            }
            // update new image 
            $image = $request->file('user_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $validated['user_image'] = $imageName; // Update validated data with new image name
        } else {
            // If no new image is uploaded, retain the existing image name
            $validated['user_image'] = $user->user_image;
        }
        $user->update($validated);
        return redirect()->route('user.show')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
   
     public function destroy(string $id)
     {

         $user = User::find($id);
 
         if (!$user) {
             return redirect()->route('user.show')->with('error', 'User not found.');
         }
 
         // Delete user's image if it exists
         if ($user->user_image && file_exists(public_path('images/users/' . $user->user_image))) {
             unlink(public_path('images/users/' . $user->user_image));
         }
 
         // Delete the user record from the database
         if ($user->delete()) {
             return redirect()->route('user.show')->with('success', 'User deleted successfully!');
         } else {
             return redirect()->route('user.show')->with('error', 'Failed to delete user. Please try again.');
         }
     }
}
