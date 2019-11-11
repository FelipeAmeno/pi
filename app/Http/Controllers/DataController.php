<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class DataController extends Controller
{
    public function index() 
    {
        $dados = Data::all();

        return view('welcome', compact('dados'));
    }

    public function store(Request $request) 
    {
        return response()->json(Data::create($request->all()));
    }
}
