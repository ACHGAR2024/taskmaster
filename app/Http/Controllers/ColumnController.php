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