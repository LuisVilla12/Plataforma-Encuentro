<?php

namespace App\Http\Controllers;

use App\Models\User;

class RevisoresController extends Controller
{
    //
    public function index()
    {
        $datos=User::where('tipo',2)->get();
        return view('revisores.index', compact('datos'));
    }
    public function show(User $dato){
        return view('revisores.show',['revisor'=>$dato]);
    }
    }
