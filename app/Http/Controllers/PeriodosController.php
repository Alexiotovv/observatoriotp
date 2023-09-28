<?php

namespace App\Http\Controllers;

use App\Models\periodos;
use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos=periodos::all();
        return view('panel.periodos.index',['periodos'=>$periodos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new periodos();
        $obj->nombre = request('nombre');
        $obj->descripcion = request('descripcion');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        return redirect()->route('panel.periodos.index')->with('mensaje','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(periodos $periodos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $periodo=periodos::find($id);
        return view('panel.periodos.edit',['periodo'=>$periodo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, periodos $periodos)
    {
        $id=request('id');
        $obj = periodos::findOrFail($id);
        $obj->nombre = request('nombre');
        $obj->descripcion = request('descripcion');
        $obj->save();
        return redirect()->route('panel.periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(periodos $periodos)
    {
        //
    }
}
