<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function index()
    {

        return view('apropos'); // Passez les héros à la vue
    }
}