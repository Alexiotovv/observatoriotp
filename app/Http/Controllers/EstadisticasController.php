<?php

namespace App\Http\Controllers;

use App\Models\estadisticas;
use App\Models\instituciones;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index_pagina()
    {
        $instituciones=instituciones::where('estado',1)
        ->orderByDesc('id')
        ->get();
        return view('pagina.estadisticas.index',['instituciones'=>$instituciones]);
    }

    public function index(){

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.estadistica.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(estadisticas $estadisticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estadisticas $estadisticas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estadisticas $estadisticas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estadisticas $estadisticas)
    {
        //
    }
}
