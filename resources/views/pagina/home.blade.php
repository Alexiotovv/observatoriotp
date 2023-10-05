@extends('pagina.base')

@section('contenido')
	{{-- Slider --}}
		<div class="introBlock ibSlider">
			@foreach ($noticias as $item)
				<div>
					<article class="d-flex w-100 position-relative ibColumn text-white overflow-hidden">
						<div class="alignHolder d-flex align-items-center w-100">
							<div class="align w-100 pt-20 pb-20 pt-md-40 pb-md-30 px-md-17">
								<div class="container position-relative">
									<div class="row">
										<div class="col-12 col-md-9 col-xl-7 fzMedium" >
											<h1 class="text-white mb-4 h1Medium">{{$item->titulo}}</h1>
											<p>{{$item->descripcion}}</p>
											<a href="{{route('pagina.noticias.show',$item->id)}}" class="btn btnTheme font-weight-bold btnMinSm text-capitalize position-relative border-0 p-0 mt-6" data-hover="Leer Más...">
												<span class="d-block btnText">Leer Más..</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<span class="ibBgImage bgCover position-absolute" style="background-image: url({{asset('storage/noticias/'.$item->ruta_foto)}});"></span>
					</article>
				</div>
			@endforeach
		</div>
	{{-- Cierre Slider --}}
	<section class="exploreServicesBlock position-relative pt-7 pt-md-12 pt-lg-16 pt-xl-20 pb-0 pb-md-4 pb-lg-8 pb-xl-12">
		<div class="container">
			<header class="headingHead mb-7 md-md-9 mb-lg-13">
				<div class="row align-items-end">
					<div class="col-12 col-sm-7 col-xl-5">
						<h2 class="mb-0">Observatorio</h2>
					</div>
					<div class="col-12 col-sm-5 col-xl-7 d-sm-flex justify-content-sm-end">
						<a href="services.html" class="btn btn-dark text-capitalize position-relative border-0 p-0 mt-4 mt-sm-0 mb-sm-1 minWidthMedium" data-hover="Datos">
							<span class="d-block btnText">Datos</span>
						</a>
					</div>
				</div>
			</header>
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 col-lg-4">
					<article class="esColumn position-relative text-center mb-13">
						<span class="imgHolder d-block w-100 bgCover" style="background-image: url(images/img04.jpg);"></span>
						<div class="escCaption bg-white shadow position-absolute pt-4 px-2 pb-5">
							<h3 class="fwMedium mb-0">Datos Estadísticos</h3>
							<a href="{{route('pagina.estadisticas.index')}}" class="btnLink fontAlter">Ver... <i class="fas fa-chevron-right blIcn"><span class="sr-only">icon</span></i></a>
						</div>
					</article>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<article class="esColumn position-relative text-center mb-13">
						<span class="imgHolder d-block w-100 bgCover" style="background-image: url(images/img05.jpg);"></span>
						<div class="escCaption bg-white shadow position-absolute pt-4 px-2 pb-5">
							<h3 class="fwMedium mb-0">Red de Servicios</h3>
							<a href="{{route('pagina.estadisticas.index')}}" class="btnLink fontAlter">Ver aquí.. <i class="fas fa-chevron-right blIcn"><span class="sr-only">icon</span></i></a>
						</div>
					</article>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<article class="esColumn position-relative text-center mb-13">
						<span class="imgHolder d-block w-100 bgCover" style="background-image: url(images/img06.jpg);"></span>
						<div class="escCaption bg-white shadow position-absolute pt-4 px-2 pb-5">
							<h3 class="fwMedium mb-0">Normatividad</h3>
							<a href="servicesSingle.html" class="btnLink fontAlter">Ver.. <i class="fas fa-chevron-right blIcn"><span class="sr-only">icon</span></i></a>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>


	{{-- Publicaciones --}}
	<section class="newsPulicationsBlock position-relative bg-light overflow-hidden pt-7 pb-4 pt-md-10 pb-md-4 pt-lg-16 pb-lg-10 pt-xl-22 pb-xl-16">
		<div class="container position-relative npbHolder">
			<div class="row">
				<div class="col-12 col-lg-3">
					<header class="headingHead pt-2 mb-7 mb-lg-0">
						<h2 class="fwSemiBold mb-2">Noticias y Publicaciones</h2>
						<p>Encuentra las nuevas publicaciones.</p>
						<a href="{{route('pagina.noticias.index'),'%'}}" class="btn btn-outline-secondary bdrWidthAlter text-capitalize position-relative border-0 p-0 mt-5 btnXsMinWidth" data-hover="Ver Más...">
							<span class="d-block btnText">Todas Noticias...</span>
						</a>
					</header>
				</div>

				<div class="col-12 col-lg-9">
					<div class="row">
						{{-- Aqui va el For --}}
						@foreach ($noticias_portada as $item)
							<div class="col-12 col-md-6 col-xl-4">
								<article class="npbColumn shadow bg-white mb-6">
									<div class="imgHolder position-relative">
										<a href="javascript:void(0);">
											<img src="{{asset('storage/noticias/'.$item->ruta_foto)}}" class="img-fluid w-100 d-block" style="height: 320px;" alt="image description">
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
											<a href="{{route('pagina.noticias.show',$item->id)}}">{{ Str::limit($item->titulo,80)}}</a>
											
										</h3>
										<a href="{{route('pagina.noticias.show',$item->id)}}" class="btnCr d-inline-block align-top fontAlter">Continuar Leyendo <i class="icomoon-arrowRight bcIcn ml-2 align-middle"><span class="sr-only">icon</span></i></a>
									</div>
								</article>
							</div>
						@endforeach
						{{-- Aqui Cierra el For --}}
					</div>
				</div>
			</div>
		</div>
		<span class="npbBgPattern w-100 h-100 bgCover position-absolute inaccessible" style="background-image: url(images/bgPattern2.jpg);"></span>
	</section>
	{{-- Cierre de Publicaciones --}}

	{{-- Infografías --}}
	<section class="exploreHeightsBlock pt-4 pb-6 pb-md-9 pt-lg-7 pb-lg-14 pt-xl-11 pb-xl-20">
		<div class="container">
			<header class="headingHead text-center mb-12">
				<h2 class="fwSemiBold"><a href="#">Infografías</a></h2>
				<a href="{{route('pagina.infografias.index')}}" class="btn btn-dark text-capitalize position-relative border-0 p-0 mt-4 mt-sm-0 mb-sm-1 minWidthMedium" data-hover="Ver...">
					<span class="d-block btnText">Ver...</span>
				</a>
			</header>
		</div>
		<div class="row">
			<div class="echSliderWrap overflow-hidden w-100">
				<div class="echSlider mx-auto w-100">
					@foreach ($infos as $infos)
						<div>
							<div class="col-12">
								<div class="echColumn d-block w-100 bgCover position-relative" style="background-image: url({{asset('storage/infografias/'.$infos->imagen)}});">
									<a src="{{asset('storage/infografias/'.$infos->imagen)}}" class="echCountTag position-absolute fwSemiBold text-white px-3 py-1 lightbox" data-fancybox="true">
										<i class="far fa-image icn"><span class="sr-only">icon</span></i>
										6
									</a>
									<div class="echcCaptionWrap position-absolute w-100 text-white px-3 py-2 px-sm-5 py-sm-4">
										<h3 class="mb-0 text-white">
											<strong class="d-block font-weight-normal fontBase echCatTitle mb-1">Infografía</strong>
											<span class="d-block">{{ $infos->nombre }}</span>
										</h3>
										<a href="portfolioClassic.html" class="d-inline-block"><i class="rounded-circle icomoon-arrowRight d-flex align-items-center justify-content-center bg-white text-dark spanLinkGo"><span class="sr-only">icon</span></i></a>
									</div>
								</div>
							</div>
						</div>						
					@endforeach
				</div>
			</div>
		</div>
	</section>
	{{-- Cierre de Infografías --}}
@endsection