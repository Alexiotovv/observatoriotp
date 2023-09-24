<?php

namespace App\Http\Controllers;

use App\Models\home;
use App\Models\noticias;
use App\Models\infografias;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $noticias = noticias::where('slider','=',true)
        ->where('estado','=',true)
        ->orderBy('id','desc')
        ->take(18)
        ->get();
        
        $noticias_portada = noticias::where('portada','=',true)
        ->where('estado','=',true)
        ->orderBy('id','desc')
        ->take(18)
        ->get();

        $infos = infografias::where('estado','=',true)
        ->orderBy('id','desc')
        ->take(18)
        ->get();

        return view('pagina.home',['noticias'=>$noticias,'noticias_portada'=>$noticias_portada,'infos'=>$infos]);
    }
    public function index_panel()
    {
        return view('panel.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(home $home)
    {
        //
    }
}
