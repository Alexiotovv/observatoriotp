<?php

namespace App\Http\Controllers;

use App\Models\datos;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos=datos::all();
        return view('panel.datos.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.datos.create');
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
    public function show(datos $datos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datos $datos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datos $datos)
    {
        //
    }
}
