@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Liste des Tâches</h1>

        <div class="flex space-x-4 mb-4">
            <a href="{{ route('taches.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une Tâche</a>
            <a href="{{ route('columns.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter une Colonne</a>
        </div>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taches as $tache)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $tache->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $tache->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $tache->description }}</td>
                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route('taches.show', $tache->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Voir</a>
                            <a href="{{ route('taches.edit', $tache->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                            <form action="{{ route('taches.destroy', $tache->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
