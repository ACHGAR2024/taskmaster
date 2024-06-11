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

<body class="font-sans antialiased bg-arpp
">

    @include('layouts.navigation')

    <!-- Page Heading -->

    <main class="w-full h-full">

        <!-- Formulaire de contact -->
        <section class="py-6 h-screen bg-gray-50 dark:text-gray-900">
            <div
                class="rounded-lg grid max-w-6xl grid-cols-1 px-6 py-6 mx-auto lg:px-8 md:grid-cols-2 md:divide-x dark:bg-bleup">
                <div class="py-6 md:py-0 md:px-6 ">
                    <h1 class="text-4xl font-bold">TaskMaster</h1>
                    <p class="pt-2 pb-4">Le Mans La Sarthe France</p>
                    <div class="space-y-4">
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2 sm:mr-6">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Avenue de la Gare, 72000 Le mans</span>
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2 sm:mr-6">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                </path>
                            </svg>
                            <span>04 75 48 75 48</span>
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2 sm:mr-6">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                </path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span>contact@tasksmaster.com</span>
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="container mx-auto px-4 ">


                        <div id="responseMessage">
                            @if (session('success'))
                                <div class="bg-vertp text-blancp font-bold py-2 px-4 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-rougep text-blancp font-bold py-2 px-4 rounded">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <form action="/contacts" method="POST" class="w-2/3 ml-20">
                            @csrf
                            <div class="mb-4">
                                <label for="nom_contact"
                                    class="block text-gray-700 text-sm font-bold mb-2 text-left">Nom</label>
                                <input type="text" id="nom_contact" name="nom_contact"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="email_contact"
                                    class="block text-gray-700 text-sm font-bold mb-2 text-left">Email</label>
                                <input type="email" id="email_contact" name="email_contact"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="message_contact"
                                    class="block text-gray-700 text-sm font-bold mb-2 text-left">Message</label>
                                <textarea id="message_contact" name="message_contact"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- Footer -->
    <footer class="px-6 py-2 text-gray-100 bg-gray-800">
        <div class="container flex flex-col items-center justify-between mx-auto md:flex-row">

            <p class="mt-2 md:mt-0">Tous droits réservés 2024.</p>
            <div class="flex mt-4 mb-2 -mx-2 md:mt-0 md:mb-0">
                <a href="#" class="mx-2 text-gray-100 hover:text-gray-400">
                    <svg viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                        <path
                            d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="mx-2 text-gray-100 hover:text-gray-400">
                    <svg viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                        <path
                            d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="mx-2 text-gray-100 hover:text-gray-400">
                    <svg viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                        <path
                            d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

</body>

</html>
