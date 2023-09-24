@extends('pagina.base')
@section('contenido')
<div class="col-lg-12 col-sm-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrBlack rounded-0 border-0 p-4 fontAlter mb-6">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('pagina.infografias.index')}}">Infografías</a></li>
        </ol>
        <br>
    </nav>
    <div class="row">
        <div class="col-sm-12" style="text-align: center">
            <h2>Infografías</h2>
        </div>
    </div>
    <article class="ItemfullBlock portfolioSingle bodyFontAlter pt-7 pb-7 pt-md-10 pb-md-9 pt-lg-14 pb-lg-13 pt-xl-22 pb-xl-19">
        <div class="container">
            <div class="row mb-3 mb-md-6">
                {{-- Aqui va el For --}}
                @foreach ($infos as $infos)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{asset('storage/infografias/'.$infos->imagen)}}" class="potSingGallery overflow-hidden mb-6 lightbox d-block w-100" data-fancybox="true">
                            <img src="{{asset('storage/infografias/'.$infos->imagen)}}" style="max-height: 250px" class="img-fluid" alt="image description">
                        </a>
                    </div>
                @endforeach
                {{-- Aqui Cierra el For --}}
            </div>
        </div>
    </article>
    </div>
@endsection

