<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('user', 'category')->latest()->paginate(10);
        return view('announcements.indexA', compact('announcements'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('announcements.createA', compact('categories'));
    }
    public function show(Announcement $announcement)
{
    return view('announcements.show', compact('announcement'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('announcements', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        Announcement::create($validated);

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        $categories = Category::all();
        return view('announcements.editA', compact('announcement', 'categories'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,draft,archived',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('announcements', 'public');
        }

        $announcement->update($validated);

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted.');
    }
}
