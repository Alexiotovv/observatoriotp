<?php

namespace App\Http\Controllers;

use App\Models\normatividad;
use App\Models\normatividadarchivos;
use Illuminate\Http\Request;
use DB;
class NormatividadController extends Controller
{
    public function pagina_index()
    {
        $normatividad=normatividad::all()->where('estado',1)
        ->orderByDesc('id')
        ->get();
        $normatividadarchivos=normatividadarchivos::all()->where('estado',1);
        return view('pagina.normatividad.index',['normatividad'=>$normatividad]);
    }
    
    public function index()
    {
        $normatividad=DB::table('normatividads')
        ->orderByDesc('id')
        ->get();
        $normatividadarchivos=normatividadarchivos::all();
        return view('panel.normatividad.index',['normatividad'=>$normatividad,'normatividadarchivos'=>$normatividadarchivos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.normatividad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new normatividad();
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        $obj->fecha=request('fecha');
        // if ($request->hasFile('logo')){
        //     $file = request('logo')->getClientOriginalName();//archivo recibido
        //     $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
        //     $extension = request('logo')->getClientOriginalExtension();//extensión
        //     $archivo= $filename.'_'.time().'.'.$extension;//
        //     request('logo')->storeAs('normatividad/',$archivo,'public');//refiere carpeta publica es el nombre de disco
        //     $obj->logo = $archivo;
        // }
        $obj->estado=request('estado');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        return redirect()->route('panel.normatividad.index')->with('mensaje','Registro Guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(normatividad $normatividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obj=normatividad::find($id);
        return view('panel.normatividad.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request($id);
        $obj = normatividad::findOrFail($id);
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        
        if ($request->hasFile('logo')){
            $file = request('logo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('logo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('logo')->storeAs('normatividad/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->logo = $archivo;
        }
        $obj->enlace=request('enlace');
        $obj->estado=request('estado');
        $obj->iduser=auth()->user()->id;
        $obj->save();
        return redirect()->route('panel.normatividad.index')->with('mensaje','Registro Guardado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(normatividad $normatividad)
    {
        //
    }
    public function estado($id,$valor)
    {
        $obj=normatividad::findOrFail($id);
        $obj->estado=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

}
