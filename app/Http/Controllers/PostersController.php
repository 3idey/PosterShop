<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;

class PostersController extends Controller
{
    public function index()
    {
        $posters = Poster::query()->latest()->paginate(12);
        return view('posters.index', compact('posters'));
    }

    public function show(Poster $poster)
    {
        // Reuse existing view expecting an array-like structure
        $posterData = [
            'slug' => $poster->slug,
            'title' => $poster->title,
            'image' => $poster->image,
            'price' => $poster->price,
            'description' => $poster->description,
        ];
        return view('poster.show', ['poster' => $posterData]);
    }

    public function collection(string $category)
    {
        $allowed = ['films', 'sports', 'randoms'];
        abort_unless(in_array($category, $allowed, true), 404);

        $posters = Poster::where('category', $category)->latest()->paginate(12);
        $heading = ucfirst($category) . ' Collection';
        return view('posters.collection', compact('posters', 'heading', 'category'));
    }
}
