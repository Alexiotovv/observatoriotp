<?php

namespace App\Http\Controllers;

use App\Models\estadisticas;
use App\Models\instituciones;
use App\Models\periodos;
use App\Models\estadisticaarchivos;
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
    public function create($id)
    {   
        // $id=$id;
        $institucion=instituciones::find($id);
        $periodos=periodos::where('id','>',0)->orderByDesc('nombre')->get();
        return view('panel.estadistica.create',['institucion'=>$institucion,'periodos'=>$periodos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj= new estadisticas ();
        $obj->idperiodos=request('periodo');
        $obj->idinstituciones=request('institucion');
        $obj->titulo = request('titulo');
        $obj->contenido = request('contenido');
        $obj->fecha = request('fecha');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        $id_ultimo=$obj->id;

        
        if ($request->hasFile('documentos')){
            $files=$request->file('documentos');
            // dd($files);
            foreach ($files as $f) {
                $file = $f->getClientOriginalName();//archivo recibido
                $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
                $extension = $f->getClientOriginalExtension();//extensión
                $archivo= $filename.'_'.time().'.'.$extension;//
                
                $f->storeAs('estadistica/',$archivo,'public');//refiere carpeta publica es el nombre de disco
                
                $ea=new estadisticaarchivos();
                $ea->idestadistica=$id_ultimo;
                $ea->archivo= $archivo;
                $ea->extension=$extension;
                $ea->iduser=auth()->user()->id;
                $ea->save();
                // estadisticaarchivos::create([
                //     'idestadistica'=>$id_ultimo,
                //     'archivo'=> $archivo,
                //     'extension'=>$extension,
                //     'iduser'=>auth()->user()->id,
                // ]);
            }
        }
        
        return redirect()->route('panel.instituciones.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instituciones=instituciones::find($id);
        $estadisticas=estadisticas::where('idinstituciones',$id)
        ->leftjoin('periodos','periodos.id','=','estadisticas.idperiodos')
        ->select('periodos.nombre','estadisticas.*')->get();
        $archivos=estadisticaarchivos::all()->where('estado',1);
        return view('pagina.estadisticas.show',['instituciones'=>$instituciones,'estadisticas'=>$estadisticas,'archivos'=>$archivos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estadistica=estadisticas::find($id);
        $archivos=estadisticaarchivos::where('idestadistica','=',$id)
        ->where('estado','=',1)
        ->get();
        // dd($archivos);
        $periodos=periodos::all();
        return view('panel.estadistica.edit',['estadistica'=>$estadistica,'archivos'=>$archivos,'periodos'=>$periodos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request('idestadistica');
        $obj= estadisticas::findOrFail($id);
        $obj->idperiodos=request('periodo');
        $obj->idinstituciones=request('idinstituciones');
        $obj->titulo = request('titulo');
        $obj->contenido = request('contenido');
        // $obj->fecha = request('fecha');
        // $obj->iduser=auth()->user()->id;
        $obj->save();
        
        if ($request->hasFile('documentos')){
            $files=$request->file('documentos');
            // dd($files);
            foreach ($files as $f) {
                $file = $f->getClientOriginalName();//archivo recibido
                $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
                $extension = $f->getClientOriginalExtension();//extensión
                $archivo= $filename.'_'.time().'.'.$extension;//
                
                $f->storeAs('estadistica/',$archivo,'public');//refiere carpeta publica es el nombre de disco
                
                $ea=new estadisticaarchivos();
                $ea->idestadistica=$id;
                $ea->archivo= $archivo;
                $ea->extension=$extension;
                $ea->iduser=auth()->user()->id;
                $ea->save();
                // estadisticaarchivos::create([
                //     'idestadistica'=>$id_ultimo,
                //     'archivo'=> $archivo,
                //     'extension'=>$extension,
                //     'iduser'=>auth()->user()->id,
                // ]);
            }
        }
        
        return redirect()->route('panel.instituciones.index')->with('mensaje','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obj=estadisticaarchivos::findOrFail($id);
        $obj->estado=0;
        $obj->save();
        $data=['mensaje'=>'ok'];
        return response()->json($data);
    }
}
