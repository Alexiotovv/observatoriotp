@extends('pagina.base')
@section('contenido')
<div class="col-lg-12 col-sm-12">
<div class="row">
    <div class="col-sm-6">
        <h2>Todas las Noticias</h2>
    </div>
    <div class="col-sm-6">
        <div class="input-group mb-3">
            <div class="input-group-append">
                <form action="{{route('pagina.noticias.index')}}" method="GET">
                    <button class="btn btn-secondary" type="submit">Buscar Noticia</button>
                </div>
                <input value="{{$texto}}" name="txtBuscar" type="search" class="form-control text-left" placeholder="Escribe una noticia para buscar...">
            </form>
            </div>
        </div>
</div>
<div class="row">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center pt-2">
            
            
            @if ($noticias->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->url(1) !!}" style="display: none">|< </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->previousPageUrl() !!}" style="display:none"><i class="fas fa-chevron-left icn"><span class="sr-only">icon</span></i>Anterior</a>
                </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{!! $noticias->url(1) !!}">|< </a>
            </li>
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->previousPageUrl() !!}"><i class="fas fa-chevron-left icn"><span class="sr-only">icon</span></i>Anterior</a>
                </li>
            @endif
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">Pág. {{$noticias->currentPage()}}</a>
            </li>
            @if ($noticias->lastPage()==$noticias->currentPage())
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->nextPageUrl() !!}" style="display: none">Siguiente<i class="fas fa-chevron-right icn"><span class="sr-only">icon</span></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->url($noticias->lastPage()) !!}" style="display: none"> >|</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->nextPageUrl() !!}">Siguiente<i class="fas fa-chevron-right icn"><span class="sr-only">icon</span></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{!! $noticias->url($noticias->lastPage()) !!}"> >|</a>
                    
                </li>
            @endif

        </ul>
    </nav>

</div>  
  <hr>
        
        <div class="row">
            {{-- Aqui va el For --}}
            @foreach ($noticias as $item)
                <div class="col-12 col-md-8 col-xl-4">
                    <article class="npbColumn shadow bg-white mb-4">
                        <div class="imgHolder position-relative">
                            <a href="javascript:void(0);">
                                <img src="{{asset('storage/noticias/'.$item->ruta_foto)}}" class="img-fluid w-100 d-block" style="height: 300px;" alt="image description">
                            </a>
                            <time datetime="2011-01-12" class="npbTimeTag font-weight-bold fontAlter position-absolute text-white px-2 py-1">
                                {{$item->fecha}}
                            </time>
                        </div>
                        <div class="npbDescriptionWrap px-5 pt-8 pb-5">
                            <strong class="d-block npbcmWrap font-weight-normal mb-1">
                                <span class="mr-5">En Noticias</span>
                                <i class="icomoon-chat"><span class="sr-only">icon</span></i> 0
                            </strong>
                            <h3 class="fwSemiBold mb-6">
                                <a href="{{route('pagina.noticias.show')}}">{{ Str::limit($item->titulo,80)}}</a>
                                
                            </h3>
                            <a href="{{route('pagina.noticias.show')}}" class="btnCr d-inline-block align-top fontAlter">Continuar Leyendo <i class="icomoon-arrowRight bcIcn ml-2 align-middle"><span class="sr-only">icon</span></i></a>
                        </div>
                    </article>
                </div>
            @endforeach
            {{-- Aqui Cierra el For --}}
            
            {{-- <nav aria-label="Page navigation">
                
                {!! $noticias->links() !!}

            </nav> --}}
        </div>
        <div class="row">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center pt-2">
                    
                    
                    @if ($noticias->onFirstPage())
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->url(1) !!}" style="display: none">|< </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->previousPageUrl() !!}" style="display:none"><i class="fas fa-chevron-left icn"><span class="sr-only">icon</span></i>Anterior</a>
                        </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{!! $noticias->url(1) !!}">|< </a>
                    </li>
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->previousPageUrl() !!}"><i class="fas fa-chevron-left icn"><span class="sr-only">icon</span></i>Anterior</a>
                        </li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">Pág. {{$noticias->currentPage()}}</a>
                    </li>
                    @if ($noticias->lastPage()==$noticias->currentPage())
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->nextPageUrl() !!}" style="display: none">Siguiente<i class="fas fa-chevron-right icn"><span class="sr-only">icon</span></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->url($noticias->lastPage()) !!}" style="display: none"> >|</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->nextPageUrl() !!}">Siguiente<i class="fas fa-chevron-right icn"><span class="sr-only">icon</span></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{!! $noticias->url($noticias->lastPage()) !!}"> >|</a>
                            
                        </li>
                    @endif

                </ul>
            </nav>

        </div>


        
    </div>
@endsection