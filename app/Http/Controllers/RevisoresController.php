<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RevisoresController extends Controller
{
    //
    public function index()
    {
        $datos=User::all();
        return view('revisores.index', compact('datos'));
    }
}
