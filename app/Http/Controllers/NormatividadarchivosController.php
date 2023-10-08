<?php

namespace App\Http\Controllers;

use App\Models\normatividadarchivos;
use App\Models\normatividad;
use Illuminate\Http\Request;

class NormatividadarchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($idnormatividad)
    { 
        $id=$idnormatividad;
        $norma=normatividad::findOrFail($id);
        $titulo=$norma->titulo;
        // $titulonorma=$titulonorma;
        return  view('panel.normatividadarchivos.create',['idnormatividad'=>$id,'titulo'=>$titulo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj= new normatividadarchivos();
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('normatividadarchivos/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->archivo = $archivo;
            $obj->extension=$extension;
        }
        $obj->idnormatividad=request('idnormatividad');
        $obj->titulo=request('titulo');
        $obj->fecha=request('fecha');
        $obj->estado=request('estado');
        $obj->iduser=auth()->user()->id;
        $obj->save();

        return redirect()->route('panel.normatividad.index')->with('mensaje','Registro Guardado Correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(normatividadarchivos $normatividadarchivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(normatividadarchivos $normatividadarchivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, normatividadarchivos $normatividadarchivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obj=Normatividadarchivos::find($id);
        $obj->delete();
        $data=['mensaje'=>'Registro Eliminado'];
        return redirect()->route('panel.normatividad.index');
        // return response()->json($data, 200);
    }
}
