<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\BreakingNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BreakingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all news
        $news = News::orderBy('news_slug')->get();
        return view('dashboard.breakingnews.add', compact('news'));
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
            'news_id' => 'required|exists:news,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'breakingnews_status' => 'required|string|in:active,inactive',
            'title' => 'required|string',
            'breakingnews_slug' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('breakingnews_images/images'), $imageName);
            $validated['image'] = $imageName;
        }
      // Add the authenticated user's ID to the validated data array
        $validated['author_id'] = Auth::id(); // <--- Corrected line
        BreakingNews::create($validated);
        return redirect()->route('breakingnews.show')->with('success', 'Breaking news added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $breakingNews = BreakingNews::paginate(5);
        return view('dashboard.breakingnews.show', compact('breakingNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::all();
        $breakingNews = BreakingNews::findOrFail($id);
        return view('dashboard.breakingnews.edit', compact('breakingNews', 'news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'news_id' => 'required|exists:news,id',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'breakingnews_status' => 'required|string|in:active,inactive',
            'title' => 'required|string',
            'breakingnews_slug' => 'required|string',
        ]);

        $breakingNews = BreakingNews::findOrFail($id);

        // Delete the old image if a new image is uploaded
        if ($request->hasFile('image')) {
            if ($breakingNews->image) {
                $oldImagePath = public_path('breakingnews_images/images/' . $breakingNews->image);
                if (File::exists($oldImagePath)) { // Use File::exists to check if the file actually exists
                    File::delete($oldImagePath); // Use File::delete or unlink()
                }
            }
        }

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('breakingnews_images/images'), $imageName);
            $validated['image'] = $imageName;
        }

        $breakingNews->update($validated);

        return redirect()->route('breakingnews.show')->with('success', 'Breaking news updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $breakingNews = BreakingNews::findOrFail($id);
        $breakingNews->delete();
        return redirect()->route('breakingnews.show')->with('success', 'Breaking news deleted successfully');
    }
}
