<?php
namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Column;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::all();
        return view('taches.index', compact('taches'));
    }

    public function create()
    {
        $columns = Column::all(); // Récupérer toutes les colonnes depuis la base de données
        return view('taches.create', compact('columns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'column_id' => 'required|exists:columns,id',
        ]);

        Tache::create($request->all());

        return redirect()->route('taches.index')
            ->with('success', 'Tâche créée avec succès.');
    }
    public function show($tacheId)
    {
        $tache = Tache::findOrFail($tacheId); // Trouver la tâche par son ID
        return view('taches.show', compact('tache'));
    }


    public function edit($tacheId)
    {
        $tache = Tache::findOrFail($tacheId);
        $columns = Column::all(); // Récupérez les colonnes à partir de votre modèle de colonne ou d'une autre source de données

        return view('taches.edit', compact('tache', 'columns'));
    }



    public function update(Request $request, Tache $tache)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'column_id' => 'required|exists:columns,id',
        ]);

        // Mise à jour de la tâche
        $tache->update($validatedData);

        // Redirection vers la page de détails de la tâche
        return redirect()->route('taches.show');
    }


    public function destroy(Tache $tache)
    {
        $tache->delete();

        return redirect()->route('taches.index')
            ->with('success', 'Tâche supprimée avec succès.');
    }
}