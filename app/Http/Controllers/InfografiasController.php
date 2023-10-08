<?php

namespace App\Http\Controllers;

use App\Models\infografias;
use Illuminate\Http\Request;

class InfografiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos=infografias::all();
        return view('panel.infografias.index',['infos'=>$infos]);
    }
    public function index_pagina()
    {
        $infos=infografias::where('estado','1')
        ->orderByDesc('id')
        ->get();
        return view('pagina.infografias.index',['infos'=>$infos]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.infografias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj= new infografias();
        if ($request->hasFile('imagen')){
            $file = request('imagen')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('imagen')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('imagen')->storeAs('infografias/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->imagen = $archivo;
        }
        $obj->nombre=request('nombre');
        $obj->iduser=auth()->user()->id;
        $obj->save();

        return redirect()->route('panel.infografias.index')->with('mensaje','Registro Guardado Correctamente!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(infografias $infografias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($infografias)
    {
        $infos=infografias::find($infografias);
        return view('panel.infografias.edit',['infos'=>$infos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request('id');
        $obj=infografias::findOrFail($id);
        if ($request->hasFile('imagen')){
            $file = request('imagen')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('imagen')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('imagen')->storeAs('infografias/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->imagen = $archivo;
        }

        $obj->nombre=request('nombre');
        $obj->save();
        return redirect()->route('panel.infografias.index')->with('mensaje','Registro Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(infografias $infografias)
    {
        //
    }
    public function estado($id,$valor)
    {
        $obj=infografias::findOrFail($id);
        $obj->estado=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
}
