<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filename . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = null;
        }

        Blog::create([
            'title' => $request->title,
            'image' => $filename,
            'content' => $request->content,
            'user_id' => Auth::id(), // Associer le blog à l'utilisateur authentifié
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'Post créé avec succès!');
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $filename = $blog->image;
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filename . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/uploads', $filename);
        }

        $blog->update([
            'title' => $request->title,
            'image' => $filename,
            'content' => $request->content
        ]);

        return redirect()->route('blog.show', $blog)
            ->with('success', 'Post modifié avec succès!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Post supprimé avec succès!');
    }
}
