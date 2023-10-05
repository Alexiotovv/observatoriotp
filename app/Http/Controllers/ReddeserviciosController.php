<?php

namespace App\Http\Controllers;

use App\Models\reddeservicios;
use Illuminate\Http\Request;

class ReddeserviciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reddeservicios=reddeservicios::all()->where('estado',1);
        return view('panel.reddeservicios.index',['reddeservicios'=>$reddeservicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.reddeservicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new reddeservicios();
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        
        if ($request->hasFile('logo')){
            $file = request('logo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('logo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('logo')->storeAs('reddeservicios/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->logo = $archivo;
        }
        $obj->enlace=request('enlace');
        $obj->estado=request('estado');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        return redirect()->route('panel.reddeservicios.index')->with('mensaje','Registro Guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(reddeservicios $reddeservicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obj=reddeservicios::find($id);
        return view('panel.reddeservicios.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request($id);
        $obj = reddeservicios::findOrFail($id);
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        
        if ($request->hasFile('logo')){
            $file = request('logo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('logo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('logo')->storeAs('reddeservicios/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->logo = $archivo;
        }
        $obj->enlace=request('enlace');
        $obj->estado=request('estado');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        return redirect()->route('panel.reddeservicios.index')->with('mensaje','Registro Guardado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reddeservicios $reddeservicios)
    {
        //
    }
    public function estado($id,$valor)
    {
        $obj=reddeservicios::findOrFail($id);
        $obj->estado=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

}
