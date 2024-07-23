<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

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

	{{-- <!--PreLoader-->
	<div class="loader">
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
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
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
							<tbody>
								@foreach ($rec as $item)
									@php
										$subtotal = $item->hargajual * $item->qty;
										$totalSubtotal += $subtotal;
										$fotos = json_decode($item->foto, true);
									@endphp
									<tr class="table-body-row">
										<td class="product-remove">
											<form method="POST" action="{{ route('cart.destroy', $item->id) }}"
												class="delete-form">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-link delete-btn m-0 p-0"
													data-nama="{{ $item->nama_barang }}">
													<i class="far fa-window-close"></i>
												</button>
											</form>
										</td>
										<td class="product-image" style="text-align: center;">
											@if (is_array($fotos) && !empty($fotos))
												<img src="{{ asset($fotos[0]) }}" height="75"
													width="65" />
											@else
												<img src="{{ asset($item->foto) }}" height="75"
													width="65" />
											@endif
										</td>
										{{-- <td class="users-name" style="text-align: justify">
											{{ $item->nama_users }}</td> --}}
										<td class="product-name" style="text-align: justify">
											{{ $item->nama_barang }}</td>
										<td class="product-price">
											RP.{{ number_format($item->hargajual, 0, ',', '.') }}</td>
										<td class="product-quantity">
											<form method="POST"
												action="{{ route('cart.update', $item->id) }}">
												@csrf
												@method('PATCH')
												<input type="number" name="qty" value="{{ $item->qty }}"
													min="1" onchange="this.form.submit()"
													style="text-align: center">
											</form>
										</td>
										<td class="product-total">RP.
											{{ number_format($subtotal, 0, ',', '.') }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				@php
					$ischekout = DB::table('tbchekout')
					    ->where('id_user', Auth()->user()->id)
					    ->where('status', 'pending')
					    ->first();
					// dd($ischeckout);
				@endphp


				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
									@if ($ischekout)
										<th>Status</th>
									@endif
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>RP. {{ number_format($totalSubtotal, 0, ',', '.') }}</td>
									@if ($ischekout)
										<td>{{ $ischekout->status }}</td>
									@endif
								</tr>

							</tbody>
						</table>
						<div class="cart-buttons">
							@if ($ischekout)
							@else
								<a href="{{ url('chekout') }}" class="boxed-btn black">Check Out</a>
							@endif
							<a href="{{ url('shop') }}" class="boxed-btn black">Belanja Lagi</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const deleteForms = document.querySelectorAll('.delete-form');

			deleteForms.forEach(form => {
				form.addEventListener('submit', function(event) {
					const productName = form.querySelector(
						'.delete-btn').getAttribute(
						'data-nama');
					const confirmation = confirm(
						`Apakah Anda yakin ingin menghapus produk "${productName}"?`
					);

					if (!confirmation) {
						event.preventDefault();
					}
				});
			});
		});
	</script>


	{{-- <script>
		document.addEventListener('DOMContentLoaded', function() {
			const deleteForms = document.querySelectorAll('.delete-form');

			deleteForms.forEach(form => {
				form.addEventListener('submit', function(event) {
					const productName = form.querySelector(
						'.delete-btn').getAttribute(
						'data-nama');
					const confirmation = confirm(
						`Apakah Anda yakin ingin menghapus produk "${productName}"?`
						);

					if (!confirmation) {
						event.preventDefault();
					}
				});
			});
		});
	</script> --}}

	<!-- end cart -->

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
