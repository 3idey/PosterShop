<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostersAdminController extends Controller
{
    public function index()
    {
        $posters = Poster::latest()->paginate(20);
        return view('admin.posters.index', compact('posters'));
    }

    public function create()
    {
        return view('admin.posters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posters,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:films,sports,randoms',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posters', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Poster::create($data);
        return redirect()->route('admin.posters.index')->with('success', 'Poster created');
    }

    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', compact('poster'));
    }

    public function update(Request $request, Poster $poster)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posters,slug,' . $poster->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:films,sports,randoms',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posters', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $poster->update($data);
        return redirect()->route('admin.posters.index')->with('success', 'Poster updated');
    }

    public function destroy(Poster $poster)
    {
        $poster->delete();
        return redirect()->route('admin.posters.index')->with('success', 'Poster deleted');
    }
}
