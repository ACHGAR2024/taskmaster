@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Détails de la Tâche</h1>

            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:w-48" src="https://picsum.photos/150" alt="Tâche">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Nom</div>
                        <p class="mt-2 text-gray-600">{{ $tache->name }}</p>
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">Description</div>
                        <p class="mt-2 text-gray-600">{{ $tache->description }}</p>
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">Colonne</div>
                        <p class="mt-2 text-gray-600">
                            {{ $tache->column ? $tache->column->name : 'Aucune colonne associée' }}</p>
                        <div class="mt-6">
                            <a href="{{ route('taches.edit', $tache->id) }}"
                                class="inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-700">Éditer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
