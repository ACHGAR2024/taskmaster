<?php


namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Column;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColumnController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'index' => 'required|integer',
            'group_id' => 'required|exists:groups,id', // Valider que group_id existe dans la table groups
        ]);

        // Créer la colonne avec les données validées
        $column = Column::create($validatedData);

        return redirect()->route('groups.show', $validatedData['group_id']);
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

        return redirect()->route('groups.show', $column->group_id);
    }

    public function destroy(Column $column)
    {
        $group = $column->group;
        $column->delete();

        return redirect()->route('groups.show', $group);
    }
}
