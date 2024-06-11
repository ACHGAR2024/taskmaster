<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Group;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    public function store(Request $request, Group $group)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'index' => 'required|integer',
        ]);

        // Créer la colonne avec les données validées
        $column = $group->columns()->create($validatedData);

        return redirect()->route('groups.show', $group);
    }

    public function update(Request $request, Column $column)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'index' => 'required|integer',
        ]);

        // Mettre à jour la colonne avec les données validées
        $column->update($validatedData);

        return redirect()->route('groups.show', $column->group);
    }

    public function destroy(Column $column)
    {
        $group = $column->group;
        $column->delete();

        return redirect()->route('groups.show', $group);
    }
}
