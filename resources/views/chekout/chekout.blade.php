<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Check Out</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png"
		href="{{ url('main/assets/img/favicon.png') }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
		rel="stylesheet">
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
	{{-- <div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div> --}}
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
								<li class="current-list-item"><a href="{{ url('/') }}">Home</a>
									{{-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> --}}
								</li>
								<li><a href="{{ url('about') }}">About</a></li>
								{{-- <li><a href="#">Pages</a> --}}
								{{-- <ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul> --}}
								{{-- </li> --}}
								{{-- <li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li> --}}
								<li><a href="{{ url('contact') }}">Contact</a></li>
								<li><a href="{{ url('shop') }}">Shop</a>
									{{-- <ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul> --}}
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ url('cart') }}"><i
												class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i
												class="fas fa-search"></i></a>
										{{-- <a class="login-icon" href="{{ url('login') }}">
											<i class="fas fa-user"></i>
										</a> --}}
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
	<!-- end search arewa -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	{{-- <div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse"
											data-target="#collapseOne" aria-expanded="true"
											aria-controls="collapseOne">
											Billing Address
										</button>
									</h5>
								</div>
								<div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<form action="{{ route('chekout.store') }}" method="POST"
												enctype="multipart/form-data">
												<p><input type="text" name="nama"
														value={{ auth()->user()->name }}  /></p>
												<p><input type="email" placeholder="Email"
														value={{ auth()->user()->email }}></p>
												<p><input type="text" placeholder="alamat"></p>
												<p><input type="text" placeholder="nohp"></p>

											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div id="collapseThree" class="collapse"
									aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<div class="card-details">
											<p>Your card details goes here.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="order-details-wrap">
						<h4 class="order-details-title">Your Order Details</h4>
						<table class="order-details">
							<thead>
								<tr>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							@php
								$rec = DB::table('tbcart')
								    ->join('tbstok', 'tbcart.idstok', '=', 'tbstok.id')
								    ->join('users', 'tbcart.id_user', '=', 'users.id')
								    ->where('id_user', auth()->user()->id)
								    ->select(
								        'tbcart.*',
								        'tbstok.nama AS nama_barang',
								        'tbstok.hargajual',
								        'tbstok.foto',
								        'users.name AS nama_users',
								    )
								    ->get();
								$totalSubtotal = 0;
							@endphp
							<tbody class="order-details-body">
								@foreach ($rec as $item)
									@php
										$subtotal = $item->hargajual * $item->qty;
										$totalSubtotal += $subtotal;
										$fotos = json_decode($item->foto, true);
									@endphp
									<tr class="table-body-row">
										<td class="product-name" style="text-align: justify">
											{{ $item->nama_barang }}</td>
										<td class="product-price">
											RP.{{ number_format($item->hargajual, 0, ',', '.') }}</td>
										<td class="product-quantity" style="text-align: center">
											{{ $item->qty }}</td>
										<td class="product-total">RP.
											{{ number_format($subtotal, 0, ',', '.') }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="total-harga-wrap"
							style="margin-top: 20px; padding: 15px; border-top: 1px solid #ddd; text-align: right; background-color: #f9f9f9; border-radius: 5px;">
							<h4 style="font-weight: bold; margin-bottom: 0;">Total Harga:</h4>
							<h3 style="margin-top: 5px; color: #e74c3c;">
								RP.{{ number_format($totalSubtotal, 0, ',', '.') }}</h3>
						</div>
						<p><input type="file" name="fotobayar" accept="image/*"></p>
						<a href="#" class="boxed-btn"
							style="display: block; text-align: center; margin-top: 20px; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">Place
							Order</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse"
											data-target="#collapseOne" aria-expanded="true"
											aria-controls="collapseOne">
											Billing Address
										</button>
									</h5>
								</div>
								<div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<form action="{{ route('chekout.store') }}" method="POST"
												enctype="multipart/form-data">
												@csrf
												<p><input type="text" name="nama"
														value="{{ auth()->user()->name }}" required /></p>
												<p><input type="email" name="email" placeholder="Email"
														value="{{ auth()->user()->email }}" required></p>
												<p><input type="text" name="alamat" placeholder="Alamat"
														required></p>
												<p><input type="text" name="nohp" placeholder="Nomor HP"
														required></p>
												<div class="form-group">
													<label for="fotobayar" class="form-label">Unggah Bukti
														Pembayaran</label>
													<p><input type="file" name="fotobayar" accept="image/*"
															required></p>
												</div>
												<div style="display: flex; justify-content: space-between;">
													<button type="submit" class="boxed-btn"
														style="padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">Place
														Order</button>
													<a href="{{ url('/cart') }}" class="boxed-btn"
														style="padding: 10px 20px; background-color: #f39c12; color: #fff; text-decoration: none; border-radius: 5px;">Edit
														Keranjang</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div id="collapseThree" class="collapse"
									aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<div class="card-details">
											<p>Your card details go here.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="order-details-wrap">
						<h4 class="order-details-title">Your Order Details</h4>
						<table class="order-details">
							<thead>
								<tr>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							@php
								$rec = DB::table('tbcart')
								    ->join('tbstok', 'tbcart.idstok', '=', 'tbstok.id')
								    ->join('users', 'tbcart.id_user', '=', 'users.id')
								    ->where('id_user', auth()->user()->id)
								    ->select(
								        'tbcart.*',
								        'tbstok.nama AS nama_barang',
								        'tbstok.hargajual',
								        'tbstok.foto',
								        'users.name AS nama_users',
								    )
								    ->get();
								$totalSubtotal = 0;
							@endphp
							<tbody class="order-details-body">
								@foreach ($rec as $item)
									@php
										$subtotal = $item->hargajual * $item->qty;
										$totalSubtotal += $subtotal;
										$fotos = json_decode($item->foto, true);
									@endphp
									<tr class="table-body-row">
										<td class="product-name" style="text-align: justify">
											{{ $item->nama_barang }}</td>
										<td class="product-price">
											RP.{{ number_format($item->hargajual, 0, ',', '.') }}</td>
										<td class="product-quantity" style="text-align: center">
											{{ $item->qty }}</td>
										<td class="product-total">RP.
											{{ number_format($subtotal, 0, ',', '.') }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="total-harga-wrap"
							style="margin-top: 20px; padding: 15px; border-top: 1px solid #ddd; text-align: right; background-color: #f9f9f9; border-radius: 5px;">
							<h4 style="font-weight: bold; margin-bottom: 0;">Total Harga:</h4>
							<h3 style="margin-top: 5px; color: #e74c3c;">
								RP.{{ number_format($totalSubtotal, 0, ',', '.') }}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	{{-- </div>
	</div> --}}
	<!-- end check out section -->

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
