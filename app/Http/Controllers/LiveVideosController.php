<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\liveVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::where('category_status', 'active')->get();
        return view('dashboard.LiveVideos.add', compact('categories'));
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
            'video_url' => 'required|string',
            'video_title' => 'required|string',
            'category_id' => 'required',
            'video_status' => 'required|string|in:active,inactive',
            'video_slug' => 'string|max:255',
        ]);
        $validated['author_id'] = Auth::id();

        liveVideos::create($validated);
        return redirect()->route('livevideo.show')->with('success', 'Live video added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $videos = liveVideos::paginate(5);
        // dd($liveVideos);
        return view('dashboard.LiveVideos.show', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categories::where('category_status', 'active')->get();
        $video = liveVideos::find($id);
        return view('dashboard.LiveVideos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'video_url' => 'required|string',
            'video_title' => 'required|string',
            'category_id' => 'required',
            'video_status' => 'required|string|in:active,inactive',
            'video_slug' => 'string|max:255',
        ]);
        $video = liveVideos::findOrFail($id);
        $video->update($validated);
        return redirect()->route('livevideo.show')->with('success', 'Live video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = liveVideos::findOrFail($id);
        $video->delete();
        return redirect()->route('livevideo.show')->with('success', 'Live video deleted successfully');
    }
}
