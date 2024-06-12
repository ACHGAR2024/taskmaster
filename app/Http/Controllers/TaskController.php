<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'column_id' => 'required|exists:columns,id', // Valider que column_id existe dans la table columns
        ]);

        // Créer la tâche avec les données validées
        $task = Task::create($validatedData);

        // Récupérer la colonne pour la redirection
        $column = Column::find($validatedData['column_id']);

        return redirect()->route('groups.show', $column->group_id);
    }

    public function update(Request $request, Task $task)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Mettre à jour la tâche avec les données validées
        $task->update($validatedData);

        return redirect()->route('groups.show', $task->column->group_id);
    }

    public function destroy(Task $task)
    {
        $group = $task->column->group;
        $task->delete();

        return redirect()->route('groups.show', $group);
    }
}
