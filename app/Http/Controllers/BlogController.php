<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        $blogs = Blog::all();
        return view('blog.create', compact('blogs'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg, JPG',
            'content' => 'required',
        ]);

        $filename = "";
        if (
            $request->hasFile('image')
        ) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"   
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"   
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"   
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app   
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        Blog::create([
            'title' => $request->title,
            'image' => $filename,
            'content' => $request->content
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'Post crée avec succès!');
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $blogs = Blog::all();
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            'title' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg, JPG',
            'content' => 'required',
        ]);

        $filename = "";
        if (
            $request->hasFile('image')
        ) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"   
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"   
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"   
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app   
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $blog->update([
            'title' => $request->title,
            'image' => $filename,
            'content' => $request->content
        ]);

        return redirect()->route('blogs.show', $blog)
            ->with('success', 'Post modifié avec succès!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Post supprimé avec succès!');
    }

}