<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from htmlbeans.com/html/egovt/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Aug 2023 18:52:31 GMT -->
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Observatorio Trata de Personas</title>
	<!-- inlcude google nunito sans font cdn link -->
	<link rel="preconnect" href="../../../fonts.gstatic.com/index.html">
	<link href="../../../fonts.googleapis.com/css23985.css?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
	<!-- inlcude google cabin font cdn link -->
	<link href="../../../fonts.googleapis.com/css2284e.css?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="../../../css/bootstrap.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="../../../style.css">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="../../../css/colors.css">
	<!-- include the site responsive stylesheet -->
	<link rel="stylesheet" href="../../../css/responsive.css">
    @yield('extra_css')
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- phStickyWrap -->
		<div class="phStickyWrap">
			<!-- pageHeader -->
			<header id="pageHeader" class="bg-white">

				<div class="hdFixerWrap py-2 py-md-3 py-xl-5 sSticky bg-white">
					<div class="container">
						<nav class="navbar navbar-expand-md navbar-light p-0">
							<div class="logo flex-shrink-0 mr-3 mr-xl-8 mr-xlwd-16">
								<a href="{{route('home')}}">
									<img src="../../../images/logo-gorel.png" style="height: 70px;" class="img-fluid" alt="egovt">
								</a>
							</div>
							<div class="hdNavWrap flex-grow-1 d-flex align-items-center justify-content-end justify-content-lg-start">
								<div class="collapse navbar-collapse pageMainNavCollapse mt-2 mt-md-0" id="pageMainNavCollapse">
									<ul class="navbar-nav mainNavigation">
										<li class="nav-item dropdown ddohOpener">
											<a class="nav-link dropdown-toggle" href="{{route('home')}}">Inicio</a>

										</li>
										<li class="nav-item dropdown ddohOpener">
											<a class="nav-link dropdown-toggle dropIcn" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quienes Somos</a>
											<div class="dropdown-menu hdMainDropdown desktopDropOnHover">
												<ul class="list-unstyled mb-0 hdDropdownList">
													<li><a class="dropdown-item" href="#">Cómo Inició</a></li>
													<li><a class="dropdown-item" href="#">Lo que hacemos</a></li>
													<li><a class="dropdown-item" href="#">Nuestro Equipo</a></li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown ddohOpener">
											<a class="nav-link dropdown-toggle dropIcn" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Observatorio</a>
											<div class="dropdown-menu hdMainDropdown desktopDropOnHover">
												<ul class="list-unstyled mb-0 hdDropdownList">
													<li><a class="dropdown-item" href="{{route('panel.instituciones.index')}}">Datos Estadístico</a></li>
													<li><a class="dropdown-item" href="">Red de Servicios</a></li>
													<li><a class="dropdown-item" href="">Normatividad</a></li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown ddohOpener">
											<a class="nav-link dropdown-toggle dropIcn" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Publicaciones</a>
											<div class="dropdown-menu hdMainDropdown desktopDropOnHover">
												<ul class="list-unstyled mb-0 hdDropdownList">
													<li><a class="dropdown-item" href="{{route('pagina.noticias.index')}}">Noticias</a></li>
													<li><a class="dropdown-item" href="">Notas Informativas</a></li>
													<li><a class="dropdown-item" href="">Folletos</a></li>
													<li><a class="dropdown-item" href="">Libros</a></li>
													<li><a class="dropdown-item" href="{{route('pagina.infografias.index')}}">Infografías</a></li>
												</ul>
											</div>
										</li>

										<li class="nav-item dropdown ddohOpener">
											<a class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marco Conceptual</a>
										</li>

									</ul>
								</div>
								<form action="#" class="hdSearchForm ml-3 ml-xl-6">
									<a class="hdSearchOpener" data-toggle="collapse" href="#hdSearchCollapse" role="button" aria-expanded="false" aria-controls="hdSearchCollapse">
										<i class="icomoon-search"><span class="sr-only">search</span></i>
									</a>
									<div class="collapse hdSearchCollapse d-block position-fixed" id="hdSearchCollapse">
										<div class="d-flex w-100 h-100 align-items-center jusity-content-center">
											<div class="container d-block text-center text-light">
												<div class="row">
													<div class="col-12 col-md-8 offset-md-2">
														<div class="input-group mb-3">
															<input type="search" class="form-control text-left" placeholder="Search&hellip;">
															<div class="input-group-append">
																<button class="btn btn-secondary" type="button">Search</button>
															</div>
														</div>
														<p class="mb-0">Popular searches: <br class="d-md-none"><a href="javascript:void(0);">Modern PSD</a>, <a href="javascript:void(0);">Portfolio design</a></p>
													</div>
												</div>
											</div>
										</div>
										<a class="position-absolute rounded-circle bg-danger text-white btnClose d-flex align-items-center justify-content-center" data-toggle="collapse" href="#hdSearchCollapse" role="button" aria-expanded="true" aria-controls="hdSearchCollapse">
											<i class="fas fa-times"><span class="sr-only">search</span></i>
										</a>
									</div>
								</form>
							</div>
							<div class="hdRighterWrap d-flex align-items-center justify-content-end">

								<a href="contact-1.html" class="btn btn-outline-secondary bdrWidthAlter ml-3 ml-xl-6 btnHd d-none d-lg-block text-capitalize position-relative border-0 p-0" data-hover="aula virtual">
									<span class="d-block btnText">Aula virtual</span>
								</a>
								<button class="navbar-toggler pgNavOpener ml-2 bdrWidthAlter position-relative" type="button" data-toggle="collapse" data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>
						</nav>
					</div>
				</div>
			</header>
		</div>

		<main>

            @yield('contenido')
			
		</main>

		{{-- Pie de Página --}}
		<div class="ftAreaWrap position-relative bg-gDark fontAlter">
			
			<!-- footerAside -->
			<aside class="footerAside pt-9 pb-sm-2 pt-xl-14 pb-xl-12">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-5 col-xl-3 mb-6">
							<div class="ftLogo mt-md-1 mb-6">
								<a href="home.html">
									<img src="../../../images/logoWhite.png" class="img-fluid" alt="egovt">
								</a>
							</div>
							<address class="mb-0 ftPlace">
								<p class="mb-2"><strong class="font-weight-normal">Observatorio Trata de personas</strong></p>
								<ul class="list-unstyled ftpScheduleList mb-0">
									<li>
										<i class="icomoon-clock fwSemiBold icn mr-1 mr-sm-0"><span class="sr-only">icon</span></i>
										<strong class="title font-weight-normal text-white">Horario:</strong>
										<br>
										<time datetime="2011-01-12">Lun – Vie: 7:00 am – 3:00 pm</time>
									</li>
									<li>
										<i class="fas fa-phone-alt icn mr-1 mr-sm-0"><span class="sr-only">icon</span></i>
										<strong class="title font-weight-normal text-white">Teléfono:</strong>
										<a href="tel:18001234567">999 999 999</a>
									</li>
									<li>
										<i class="fas fa-envelope icn mr-1 mr-sm-0"><span class="sr-only">icon</span></i>
										<strong class="title font-weight-normal text-white">Correo:</strong>
										<a href="mailto:demo@example.com">info@observatoriotdp.com</a>
									</li>
								</ul>
							</address>
						</div>
						<div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xlwd-2 mb-6">
							<h3 class="ftHeading text-white mb-4">Quienes Somos</h3>
							<ul class="list-unstyled ftsrLinksList mb-0">
								<li>
									<a href="servicesSingle.html">Cómo inició</a>
								</li>
								<li>
									<a href="servicesSingle.html">Lo que hacemos</a>
								</li>
								<li>
									<a href="servicesSingle.html">Nuestro Equipo</a>
								</li>
								
							</ul>
						</div>
						<div class="col-12 col-sm-4 col-md-3 col-xl-2 col-xlwd-3 mb-6">
							<div class="pl-xlwd-11">
								<h3 class="ftHeading text-white mb-4">Observatorio</h3>
								<ul class="list-unstyled ftsrLinksList mb-0">
									<li>
										<a href="newsClassic.html">Datos Estadísticos</a>
									</li>
									<li>
										<a href="portfolioClassic.html">Red de Servicios</a>
									</li>
									<li>
										<a href="history.html">Normatividad</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-sm-8 col-md-12 col-xl-4 mb-6">
							<div class="ml-xl-n1 ml-xlwd-n7">
								<h3 class="ftHeading text-white mb-5">Connect With Us</h3>
								
								<ul class="list-unstyled socialNetworks ftSocialNetworks d-flex flex-wrap justify-content-center justify-content-sm-end mb-0" style="float: left">
									<li>
										<a href="javascript:void(0);">
											<i class="fab fa-facebook-square"><span class="sr-only">facebook</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i class="fab fa-twitter"><span class="sr-only">twitter</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i class="fab fa-instagram"><span class="sr-only">instagram</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i class="fab fa-youtube"><span class="sr-only">youtube</span></i>
										</a>
									</li>
								</ul>
								
								{{-- <form action="#" class="ftSubscribeForm">
									<label class="d-block mb-7">The latest Egovt news, articles, and resources, sent straight to your inbox every month.</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control form-control-lg" placeholder="Enter Your Email">
										<div class="input-group-append">
											<button type="button" class="btn btnTheme d-flex font-weight-bold text-capitalize position-relative border-0 p-0" data-hover="Send">
												<span class="d-block btnText">Subscribe</span>
											</button>
										</div>
									</div>
								</form> --}}
							</div>
						</div>
					</div>
				</div>
			</aside>
			<!-- pageFooter -->
			<footer id="pageFooter" class="text-center bg-dark pt-6 pb-3 pt-md-8 pb-md-5">
				<div class="container">
					<p><a href="javascript:void(0);">EGovt Template</a> - <a href="javascript:void(0);"> 2022. <br class="d-md-none">All Rights Reserved</p>
				</div>
			</footer>
		</div>
        {{-- cierre Pie de Página --}}

	</div>
	<!-- include jQuery library -->
	<script src="../../../js/jquery-3.4.1.min.js"></script>
	<!-- include custom JavaScript -->
	<script src="../../../js/jqueryCustom.js"></script>
	<!-- include plugins JavaScript -->
	<script src="../../../js/plugins.js"></script>
	<!-- include fontAwesome -->
	<script src="../../../kit.fontawesome.com/391f644c42.js"></script>

    @yield('extra_js')
</body>

<!-- Mirrored from htmlbeans.com/html/egovt/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Aug 2023 18:53:58 GMT -->
</html>