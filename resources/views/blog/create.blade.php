<!DOCTYPE html>
<html lang="fr">

<!-- ////////////////////////////////////////////////////////
//  Encyclopédie Héros Marvel
//  Copyright (c) 2024 , Rachid EL ACHGAR
//  All rights reserved.
////////////////////////////////////////////////////////////// -->

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
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

<body class="font-sans antialiased bg-arpp">
    <div class="min-h-screen bg-slate-900 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class=" max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <main class="">

            <div align=center>
                <slot name="header">
                    <br>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('CRÉER UN POST') }}
                    </h2>
                </slot>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="text-xl text-gray-600">Titre
                                        <span class="text-red-500">*</span>
                                    </label>
                                    </br>
                                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title"
                                        id="title" value="" required>
                                </div>

                                <div class="mb-4">
                                    <label class="text-xl text-gray-600">Image
                                        <span class="text-red-500">*</span></label></br>
                                    <input type="file" class="border-2 border-gray-300 p-2 w-full" name="image"
                                        id="image">
                                </div>

                                <div class="mb-4">
                                    <label class="text-xl text-gray-600">Description
                                        <span class="text-red-500">*</span></label></br>
                                    <textarea class="border-2 border-gray-300 p-2 w-full" name="content"></textarea>
                                </div>

                                <input type="submit" value="Créer mon post"
                                    class="p-3 bg-blue-500 text-white hover:bg-blue-400"></input>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</body>

</html>
