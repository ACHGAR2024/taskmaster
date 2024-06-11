<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\RechercherHeroesController;
use App\Http\Controllers\Auth\RegisteredUserController;


// lignes Gestion routes home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/apropos', [AproposController::class, 'index'])->name('apropos');


// Lignes Gestion routes blog

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::middleware('auth')->group(function () {
    Route::resource('blogs', BlogController::class);
});


Route::middleware('auth')->group(function () {

    // Gestion Kanban
    Route::resource('groups', GroupController::class);
    Route::post('groups/{group}/users', [GroupController::class, 'addUser'])->name('groups.addUser');
    Route::resource('columns', ColumnController::class)->except(['index', 'create', 'edit', 'show']);
    Route::resource('tasks', TaskController::class)->except(['index', 'create', 'edit', 'show']);


    // lignes Gestion routes user
    Route::resource('user', UserController::class);
    Route::patch('user/{user}/toggle-role', [UserController::class, 'toggleRole'])->name('user.toggleRole');

    // lignes Gestion routes profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // lignes Gestion routes heroes



});
// lignes contact 
Route::resource('contacts', ContactsController::class);
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/contacts/show/', [ContactsController::class, 'show'])->name('contacts.show');
Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->name('contacts.destroy');

// lignes register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// ligne rechercher


// lignes auth
require __DIR__ . '/auth.php';
