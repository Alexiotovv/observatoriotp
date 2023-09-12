<?php

namespace App\Http\Controllers;

use App\Models\instituciones;
use Illuminate\Http\Request;

class institucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituciones=instituciones::all();
        return view('panel.instituciones.index',['instituciones'=>$instituciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.instituciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new instituciones();
        if ($request->hasFile('ruta_logo')){
            $file = request('ruta_logo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('ruta_logo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('ruta_logo')->storeAs('instituciones/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->ruta_logo = $archivo;
        }
        $obj->titulo = request('titulo');
        $obj->descripcion = request('descripcion');
        $obj->contenido = request('contenido');
        //nombre archivo y ruta es arriba
        $obj->estado = request('estado');
        $obj->save();
        return redirect()->route('panel.instituciones.index')->with('mensaje','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(instituciones $instituciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $institucion=instituciones::find($id);
        return view('panel.instituciones.edit',['institucion'=>$institucion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, instituciones $instituciones)
    {
        $id=request('id');
        $obj = instituciones::findOrFail($id);
        if ($request->hasFile('ruta_logo')){
            $file = request('ruta_logo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('ruta_logo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('ruta_logo')->storeAs('instituciones/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->ruta_logo = $archivo;
        }

        $obj->titulo = request('titulo');
        $obj->descripcion = request('descripcion');
        $obj->contenido = request('contenido');
        $obj->estado = request('estado');
        $obj->save();
        return redirect()->route('panel.instituciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(instituciones $instituciones)
    {
        //
    }
}
