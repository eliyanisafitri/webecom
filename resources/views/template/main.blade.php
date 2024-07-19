<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Fruitkha</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link
		href="{{ url('main/https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet') }}">
	<link
		href="{{ url('main/https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet') }}">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ url('main/assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet"
		href="{{ url('main/assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ url('main/assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ url('main/assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ url('main/assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ url('main/assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ url('main/assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ url('main/assets/css/responsive.css') }}">

</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><a href="{{ url('about') }}">About</a></li>
								<li><a href="{{ url('contact') }}">Contact</a></li>
								<li><a href="{{ url('shop') }}">Shop</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ url('cart') }}">
											<i class="fas fa-shopping-cart"></i>
										</a>
										<a class="mobile-hide search-bar-icon" href="#">
											<i class="fas fa-search"></i>
										</a>
										@if (Auth::check())
											<a class="logout-icon" href="{{ url('logout') }}"
												onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="fas fa-sign-out-alt"></i>
											</a>
											<form id="logout-form" action="{{ url('logout') }}" method="POST"
												style="display: none;">
												@csrf
											</form>
										@else
											<a class="login-icon" href="{{ url('login') }}">
												<i class="fas fa-user"></i>
											</a>
										@endif
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i
								class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">COLL AND COLL</p>
							<h1>SHOES</h1>
							<div class="hero-btns">
								<a href="shop.html" class="boxed-btn">Fruit Collection</a>
								<a href="contact.html" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga
							quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				$rec = DB::table('tbstok')->join('tbkategori', 'tbstok.idkategori', '=', 'tbkategori.id')->select('tbstok.*', 'tbkategori.nama AS idkategori')->get();
				
				?>
				@foreach ($rec as $value)
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">

							<div class="product-image">
								<?php $fotos = json_decode($value->foto, true); ?>
								@if (is_array($fotos) && !empty($fotos))
									<a href="{{ route('product.show', ['product' => $value->id]) }}">
										<img src="{{ asset($fotos[0]) }}" alt=""
											style="width: 200px; height: 200px; object-fit: cover;">
									</a>
								@endif
							</div>
							<h3>{{ $value->nama }}</h3>
							<p class="product-price">
								Rp.{{ number_format($value->hargajual, 0, '.', '.') }}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- shop banner -->
	<section class="shop-banner">
		<div class="container">
			<h3>December sale is on! <br> with big <span
					class="orange-text">Discount...</span></h3>
			<div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span>
			</div>
			<a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
		</div>
	</section>
	<!-- end shop banner -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit
							voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
							ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran
							Hossain</a>, All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 col-md-12 text-right">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i
										class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i
										class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i
										class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i
										class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i
										class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="{{ url('main/assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ url('main/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ url('main/assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ url('main/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ url('main/assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ url('main/assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ url('main/assets/js/jquery.magnific-popup.min.js') }}">
	</script>
	<!-- mean menu -->
	<script src="{{ url('main/assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ url('main/assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ url('main/assets/js/main.js') }}"></script>

</body>

</html>
