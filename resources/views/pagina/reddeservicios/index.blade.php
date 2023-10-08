@extends('pagina.base')
@section('contenido')
<div class="col-lg-12 col-sm-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrBlack rounded-0 border-0 p-4 fontAlter mb-6">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('pagina.reddeservicios.index')}}">Red de Servicios</a></li>
        </ol>
        <br>
    </nav>
    <section class="exploreDepartmentsBlock pt-8 pb-4 pt-md-10 pb-md-7 pb-lg-10 pt-lg-14 pt-xl-20">
        <div class="container">
            <header class="headingHead text-center mb-8 mb-lg-13">
                <h2 class="mb-2">Red de Servicios</h2>
                <p>Puedes revisar nuestra estadística que tenemos disposición.</p>
            </header>
            <div class="row justify-content-center">
                @foreach ($reddeservicios as $r)
                <div class="col-12 col-sm-6 col-lg-4 d-sm-flex">
                        <article class="egdColumn shadow bg-white position-relative w-100 mb-6 mb-lg-12 text-center mx-auto">
                            <div class="imgHolder position-relative mb-5">
                                <img style="max-height: 220px" src="{{asset('storage/reddeservicios/'.$r->logo)}}" class="img-fluid w-100" alt="image description">
                                {{-- <i class="icomoon-ico11 position-absolute icnWrap rounded-circle d-flex align-items-center justify-content-center shadow"><span class="sr-only">icon</span></i> --}}
                            </div>
                            <div class="egdcCaption py-4 px-3 py-md-8 px-md-6">
                                <h3 class="fwMedium">{{$r->titulo}}</h3>
                                <p>{{Str::limit($r->descripcion,70)}}...</p>
                                <a target="_blank" href="{{$r->enlace}}" class="btn btn-outline-light btnNoOver d-block w-100 mt-7">Más Información<i class="fas btnBnoIcn fa-arrow-right mx-1"><span class="sr-only">icon</span></i></a>
                            </div>
                        </article>
                
                    </div>
                    @endforeach
            </div>
        </div>
    </section>


    </div>
@endsection

