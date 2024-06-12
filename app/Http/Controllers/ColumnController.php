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
}*/
<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Group;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    public function store(Request $request, Group $group)
    {
        // Récupérer toutes les colonnes avec leurs tâches
        $columns = Column::with('taches')->get();

        // Passer les colonnes à la vue
        return view('taches.index', compact('columns'));
    }
}