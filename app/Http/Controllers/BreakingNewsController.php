<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\BreakingNews;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BreakingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedLang = $request->language ?? 'en';

        if ($request->ajax()) {
            $news = News::where('language', $selectedLang)
                ->where('news_status', 'active')
                ->select('id', 'news_slug')
                ->get();
            return response()->json($news);
        }

        $news = News::where('language', $selectedLang)
            ->where('news_status', 'active')
            ->get();

        return view('dashboard.breakingnews.add', compact('news', 'selectedLang'));
    }

    /**
     * Return news based on language via AJAX.
     */
    public function getNewsByLanguage($lang)
    {
        $news = News::where('news_status', 'active')
            ->where('language', $lang)
            ->select('id', 'news_slug')
            ->get();

        return response()->json($news);
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
            'breakingnews_slug' => [
                'required',
                'string',
                Rule::unique('breaking_news')->where(function ($query) use ($request) {
                    return $query->where('language', $request->language);
                }),
            ],
            'language' => 'required|string|in:en,ur',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('breakingnews_images/images'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['author_id'] = Auth::id();
        BreakingNews::create($validated);

        return redirect()->route('breakingnews.show')->with('success', 'Breaking news added successfully');
    }

    /**
     * Display the list of breaking news.
     */
    public function show()
    {
        $breakingNews = BreakingNews::paginate(10);
        return view('dashboard.breakingnews.show', compact('breakingNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::all();
        $breakingNews = BreakingNews::findOrFail($id);
        $selectedLang = $breakingNews->language; // assuming 'language' column exists in DB

        return view('dashboard.breakingnews.edit', compact('breakingNews', 'news', 'selectedLang'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $breakingNews = BreakingNews::findOrFail($id);

        $validated = $request->validate([
            'news_id' => 'required|exists:news,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'breakingnews_status' => 'required|string|in:active,inactive',
            'title' => 'required|string',
            'breakingnews_slug' => [
                'required',
                'string',
                Rule::unique('breaking_news')->ignore($breakingNews->id)->where(function ($query) use ($request) {
                    return $query->where('language', $request->language);
                }),
            ],
            'language' => 'required|string|in:en,ur',
        ]);

        if ($request->hasFile('image')) {
            if ($breakingNews->image) {
                $oldImagePath = public_path('breakingnews_images/images/' . $breakingNews->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

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

        if ($breakingNews->image) {
            $imagePath = public_path('breakingnews_images/images/' . $breakingNews->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $breakingNews->delete();
        return redirect()->route('breakingnews.show')->with('success', 'Breaking news deleted successfully');
    }
}
