<?php
namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    public function create()
    {
        return view('columns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:columns|max:255',
        ]);

        Column::create([
            'name' => $request->name,
        ]);

        return redirect()->route('home')->with('success', 'Colonne créée avec succès.');
    }
}