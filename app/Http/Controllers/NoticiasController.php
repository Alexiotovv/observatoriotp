<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function noticias_index(Request $request)
    {
        $texto=$request->get('txtBuscar');

        $noticias=noticias::where('estado','=',true)
        ->where('titulo','like','%'. $texto .'%')
        // ->where('description')
        ->orderBy('id','desc')
        ->paginate(20);
        
        return view('pagina.noticias.index',['noticias'=>$noticias,'texto'=>$texto]);
    }


    public function index()
    {
        $noticias=noticias::all();
        return view('panel.noticias.index',['noticias'=>$noticias]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.noticias.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new noticias();
        if ($request->hasFile('ruta_foto')){
            $file = request('ruta_foto')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('ruta_foto')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('ruta_foto')->storeAs('noticias/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->ruta_foto = $archivo;
        }
        $obj->titulo = request('titulo');
        $obj->description = request('descripcion');
        $obj->contenido = request('contenido');
        $obj->fecha = request('fecha');
        //nombre archivo y ruta es arriba
        $obj->slider = request('slider');
        $obj->portada = request('portada');
        $obj->estado = request('estado');
        $obj->save();
        return redirect()->route('panel.noticias.index')->with('mensaje','ok');
    }
    /**
     * Display the specified resource.
     */
    public function show(noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($noticias)
    {
        
        $noticia=noticias::find($noticias);
        return view('panel.noticias.edit',['noticia'=>$noticia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request('id');
        $obj = noticias::findOrFail($id);
        if ($request->hasFile('ruta_foto')){
            $file = request('ruta_foto')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('ruta_foto')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('ruta_foto')->storeAs('noticias/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->ruta_foto = $archivo;
        }
        $obj->titulo = request('titulo');
        $obj->description = request('descripcion');
        $obj->contenido = request('contenido');
        $obj->fecha = request('fecha');
        //nombre archivo y ruta es arriba
        $obj->slider = request('slider');
        $obj->portada = request('portada');
        $obj->estado = request('estado');
        $obj->save();
        return redirect()->route('panel.noticias.index');
    }

    public function destroy(noticias $noticias)
    {
        //
    }
}
