<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liste des Tâches</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="[Rachid EL ACHGAR]">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="content-language" content="fr">
    <link rel="canonical" href="http://127.0.0.1:8000/">

    <!-- Open Graph meta tags for social media sharing -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="URL_de_l'image">
    <meta property="og:url" content="URL_de_la_page">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Suez+One&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class=" bg-slate-900 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="h-scbg-white dark:bg-gray-800 shadow bg-grisp">
                <div class="bg-grisp ">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <main class="bg-grisp w-full h-full">
            <div class="container mx-auto p-4 bg-grisp text-blancp">
                <h1 class="text-2xl font-bold mb-4">Liste des Tâches</h1>

                <div class="flex space-x-4 mb-4">
                    <button type="button" onclick="window.location.href='{{ route('taches.create') }}'"
                        class="bg-bleup hover:bg-vertp text-white font-bold py-2 px-4 rounded">Ajouter une
                        Tâche</button>
                    <button type="button" onclick="window.location.href='{{ route('columns.create') }}'"
                        class="bg-bleup hover:bg-vertp text-white font-bold py-2 px-4 rounded">Ajouter une
                        Colonne</button>
                </div>

                <div class="grid grid-cols-3 gap-4 text-blancp">
                    @foreach ($columns as $column)
                        <div class="bg-gray-800 rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">{{ $column->name }}</h2>
                            <div class="space-y-4">
                                @foreach ($column->taches as $tache)
                                    <div class="bg-white shadow-md rounded-lg p-4 bg-vertp">
                                        <h2 class="text-ml font-bold mb-2">{{ $tache->name }}</h2>
                                        <p class="mb-4">{{ $tache->description }}</p>
                                        <div class="space-x-2">
                                            <a href="{{ route('taches.show', $tache->id) }}"
                                                class="bg-grisp shadow-md hover:bg-bleup text-white font-bold py-1 px-2 rounded">Voir</a>
                                            <a href="{{ route('taches.edit', $tache->id) }}"
                                                class="bg-grisp shadow-md hover:bg-bleup bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                                            <form action="{{ route('taches.destroy', $tache->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-rougep hover:bg-grisp text-white font-bold py-1 px-2 rounded"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

    </div>
</body>

</html>
