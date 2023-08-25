@extends('pagina.base')
@section('contenido')
{{-- <article class="newsSingleWrap pt-7 pb-2 pt-md-9 pb-md-4 pt-lg-14 pb-lg-8 pt-xl-22 pb-xl-13"> --}}
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrBlack rounded-0 border-0 p-0 fontAlter mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('pagina.noticias.index')}}">Todas las Noticias</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$noticia->fecha}}-{{ Str::limit($noticia->titulo,80)}}</li>
            </ol>
            <br>
        </nav>
        <div class="row">
            {{-- Se cambió mb-6 por mb-12 para que ocupe el ancho de la pagina --}}
            <div class="col-12 col-lg-12 col-xl-12 mb-12">
                <div class="pr-xl-14">
                    <div class="imgHolder mb-4 mb-md-8 position-relative">
                        <div class="nrcImageSlider">
                            <div>
                                <div class="imgWrap">
                                    <img src="{{asset('storage/noticias/'.$noticia->ruta_foto)}}" class="img-fluid w-100" alt="image description">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <header class="nrcHead">
                        <strong class="d-block fwMedium title mb-1">
                            <i class="icnTheme fwMedium icomoon-clock"><span class="sr-only">icon</span></i>
                            <time datetime="2011-01-12">{{$noticia->fecha}}</time>
                            
                            <a href="javascript:void(0);" class="text-lDark">Publicado</a>
                            por
                            <a href="javascript:void(0);" class="text-lDark">web Master</a>
                            &nbsp;&nbsp;
                            {{-- <i class="icomoon-chat icn"><span class="sr-only">icon</span></i>
                            3 --}}
                        </strong>
                        <h2 class="h2vii fwSemiBold mb-5">{{ $noticia['titulo'] }}</h2>
                    </header>
                    <p><span class="dropCap"></span>
                        {!! $noticia['contenido'] !!}
                    </p>
                

                    <div class="commentFormWrap">
                        <h2 class="fwSemiBold h2vii mb-6">Deja tus comentarios</h2>
                        <form action="#" class="commentForm">
                            <div class="row mx-n2">
                                <div class="col-12 col-sm-6 px-2">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control d-block w-100" placeholder="nombre completo">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 px-2">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control d-block w-100" placeholder="correo electrónico">
                                    </div>
                                </div>
                                <div class="col-12 px-2">
                                    <div class="form-group">
                                        <textarea name="comentario" class="form-control w-100 d-block" placeholder="Escribe tu comentario"></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <button type="button" class="btn btnTheme d-flex font-weight-bold text-capitalize position-relative border-0 p-0 mt-2 btnWidthSmall" data-hover="Enviar Comentario">
                                <span class="d-block btnText">Enviar Comentario</span>
                            </button>
                        </form>
                    </div>
                </div>
                {{-- Sección Comentarios --}}
                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="overflow-hidden px-3 px-md-6 pt-5 pb-1">
                        <h4 class="fwMedium mb-6">2 Reviews for Product</h4>
                        <ul class="list-unstyled reviewsList">
                            <li>
                                <div class="alignleft text-center">
                                    <span class="profiler rounded d-block mx-auto">
                                        <img class="rounded-circle d-block w-100" src="images/img120.png" alt="image description">
                                    </span>
                                </div>
                                <div class="descrWrap overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h3 class="text-capitalize mb-1"><a href="javascript:void(0);">Brandon Kelley</a></h3>
                                        <ul class="list-unstyled ratingStarList d-flex mb-0">
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <time datetime="2011-01-12" class="time d-block mb-3">March 03, 2020</time>
                                    <p>Thomas Edison may have been behind the invention of the electric light bulb, but he did not work alone. Edison worked alongside partners.</p>
                                </div>
                            </li>
                            <li>
                                <div class="alignleft text-center">
                                    <span class="profiler rounded d-block mx-auto">
                                        <img class="rounded-circle d-block w-100" src="images/img121.png" alt="image description">
                                    </span>
                                </div>
                                <div class="descrWrap overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h3 class="text-capitalize mb-1"><a href="javascript:void(0);">Beter Cobus</a></h3>
                                        <ul class="list-unstyled ratingStarList d-flex mb-0">
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li class="active"><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <time datetime="2011-01-12" class="time d-block mb-3">March 04, 2020</time>
                                    <p>Thomas Edison may have been behind the invention of the electric.</p>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                {{-- Fin de Sección Comentarios --}}
            </div>

            {{-- <div class="col-12 col-lg-4 col-xl-3 mb-6">
                <aside class="dscSidebar pt-1 ml-xl-n5">
                    <aside class="sidebar">
                        <section class="widget widgetSearch mb-6 mb-lg-10">
                            <form action="#" class="searchForm">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search Here…">
                                    <div class="input-group-append">
                                        <button class="btn btnTheme btnNoOver d-flex align-items-center justify-content-center" type="button">
                                            <i class="icomoon-search"><span class="sr-only">search</span></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <nav class="widget widgetArchiveList mb-6 mb-lg-10">
                            <h3 class="fwMedium mb-5">Categories</h3>
                            <ul class="list-unstyled pl-0">
                                <li>
                                    <a href="javascript:void(0);">Conference</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Entertainment</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Health &amp; Sports</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Meeting</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Workshop</a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="widget widgetUpcoming mb-6 mb-lg-10">
                            <h3 class="fwMedium mb-5">Recent News</h3>
                            <ul class="list-unstyled pl-0 mb-7">
                                <li>
                                    <div class="imgHolder flex-shrink-0 mr-4 mt-1">
                                        <img src="images/img92.jpg" class="img-fluid" alt="image description">
                                    </div>
                                    <div class="descrWrap">
                                        <h4 class="fwMedium mb-1">
                                            <a href="newsSingle.html">Globol Covid-19 Situation Dashboard</a>
                                        </h4>
                                        <time datetime="2011-01-12" class="d-block"><i class="icomoon-clock icn mr-1"><span class="sr-only">icon</span></i>Dec 11, 2020</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="imgHolder flex-shrink-0 mr-4 mt-1">
                                        <img src="images/img93.jpg" class="img-fluid" alt="image description">
                                    </div>
                                    <div class="descrWrap">
                                        <h4 class="fwMedium mb-1">
                                            <a href="newsSingle.html">New Australian Economic Culture</a>
                                        </h4>
                                        <time datetime="2011-01-12" class="d-block"><i class="icomoon-clock icn mr-1"><span class="sr-only">icon</span></i>Dec 05, 2020</time>
                                    </div>
                                </li>
                                <li>
                                    <div class="imgHolder flex-shrink-0 mr-4 mt-1">
                                        <img src="images/img94.jpg" class="img-fluid" alt="image description">
                                    </div>
                                    <div class="descrWrap">
                                        <h4 class="fwMedium mb-1">
                                            <a href="newsSingle.html">Summer Nights at the Library</a>
                                        </h4>
                                        <time datetime="2011-01-12" class="d-block"><i class="icomoon-clock icn mr-1"><span class="sr-only">icon</span></i>Nov 23, 2020</time>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <section class="widget widgetGallery mb-6 mb-lg-10">
                            <h3 class="fwMedium mb-5">Photo Gallery</h3>
                            <ul class="list-unstyled pl-0 d-flex flex-wrap">
                                <li>
                                    <a href="images/img194.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img194.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                                <li>
                                    <a href="images/img195.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img195.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                                <li>
                                    <a href="images/img196.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img196.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                                <li>
                                    <a href="images/img197.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img197.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                                <li>
                                    <a href="images/img194.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img194.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                                <li>
                                    <a href="images/img195.jpg" class="lightbox" data-fancybox="true">
                                        <img src="images/img195.jpg" class="img-fluid" alt="image description">
                                    </a>
                                </li>
                            </ul>
                        </section>
                  
                        <article class="widget widgetVote bgCover py-9 px-6" style="background-image: url(images/bg02.png);">
                            <h3 class="h3Large">Let’s start explore city melbourne with travel guide.</h3>
                            <a href="javascript:void(0);" class="btn btnDarkAlter text-capitalize btn-sm mt-2 position-relative border-0 p-0" data-hover="Vote Now">
                                <span class="d-block btnText">Vote Now</span>
                            </a>
                        </article>
                    </aside>
                </aside>
            </div> --}}
        </div>
    </div>
{{-- </article> --}}
@endsection