@extends('pagina.base')
@section('contenido')
<div class="col-lg-12 col-sm-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrBlack rounded-0 border-0 p-4 fontAlter mb-6">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('pagina.normatividad.index')}}">Normatividad</a></li>
        </ol>
        <br>
    </nav>
    <section class="exploreDepartmentsBlock pt-8 pb-4 pt-md-10 pb-md-7 pb-lg-10 pt-lg-14 pt-xl-20">
        <div class="container">
            <header class="headingHead text-center mb-8 mb-lg-13">
                <h2 class="mb-2">Normatividad</h2>
                <p>Consulta aquí las principales leyes, guías y protocolos para prevenir, atender, sancionar, y erradicar este problema social.
            </header>
            <div class="row justify-content-center">
                @foreach ($normatividad as $r)
                
                @endforeach
            </div>
        </div>
    </section>


    </div>
@endsection

