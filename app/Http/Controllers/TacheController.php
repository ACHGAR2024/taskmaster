<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Column;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        // Récupérer toutes les colonnes avec leurs tâches
        $columns = Column::with('taches')->get();

        // Passer les colonnes à la vue
        return view('taches.index', compact('columns'));
    }

    public function create()
    {
        $columns = Column::all();
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
        $tache = Tache::findOrFail($tacheId);
        return view('taches.show', compact('tache'));
    }

    public function edit($tacheId)
    {
        $tache = Tache::findOrFail($tacheId);
        $columns = Column::all();
        return view('taches.edit', compact('tache', 'columns'));
    }

    public function update(Request $request, $id) // Maintenant, reçoit les deux arguments
    {
        $tache = Tache::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'column_id' => 'required|exists:columns,id',
        ]);
        //dd($tache);
        $tache->update($request->all());
        //dd($request);
        return redirect()->route('taches.index')
            ->with('success', 'Tâche modifiée avec succès.');
    }



    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return redirect()->back()->withErrors(['erreur' => 'Suppression du compte réussie.']);

    }

    /*    public function destroy(Tache $tache)
        {
            $tache->delete();

            return redirect()->route('taches.index')
                ->with('success', 'Tâche supprimée avec succès.');
        }*/
}