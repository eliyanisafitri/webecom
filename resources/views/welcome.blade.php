<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Ecommerce</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
	<!-- Font Awesome Icons -->
	<link rel="stylesheet"
		href="{{ url('lte/plugins/fontawesome-free/css/all.min.css') }}" />
	<!-- IonIcons -->
	<link rel="stylesheet"
		href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('lte/dist/css/adminlte.min.css') }}" />
</head>
<!--
`body` tag options:

		Apply one or more of the following classes to to the body tag
		to get the desired effect

		* sidebar-collapse
		* sidebar-mini
-->

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
							class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
				{{-- <li class="nav-item d-none d-sm-inline-block">
					<a href="" class="nav-link">Contact</a>
				</li> --}}
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<li class="nav-item">
					<a class="nav-link" data-widget="navbar-search" href="#"
						role="button">
						<i class="fas fa-search"></i>
					</a>
					<div class="navbar-search-block">
						<form class="form-inline">
							<div class="input-group input-group-sm">
								<input class="form-control form-control-navbar" type="search"
									placeholder="Search" aria-label="Search" />
								<div class="input-group-append">
									<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
									</button>
									<button class="btn btn-navbar" type="button"
										data-widget="navbar-search">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>

				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="lte/dist/img/user1-128x128.jpg" alt="User Avatar"
									class="img-size-50 img-circle mr-3" />
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="text-danger float-right text-sm"><i
												class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-muted text-sm">
										<i class="far fa-clock mr-1"></i> 4 Hours Ago
									</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="lte/dist/img/user8-128x128.jpg" alt="User Avatar"
									class="img-size-50 img-circle mr-3" />
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="text-muted float-right text-sm"><i
												class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-muted text-sm">
										<i class="far fa-clock mr-1"></i> 4 Hours Ago
									</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="lte/dist/img/user3-128x128.jpg" alt="User Avatar"
									class="img-size-50 img-circle mr-3" />
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="text-warning float-right text-sm"><i
												class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-muted text-sm">
										<i class="far fa-clock mr-1"></i> 4 Hours Ago
									</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All
							Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="text-muted float-right text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="text-muted float-right text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="text-muted float-right text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All
							Notifications</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#"
						role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true"
						href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: 0.8" />
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<li class="nav-item nav-profile dropdown">
					<a class="nav-link dropdown-toggle" href="#"
						data-toggle="dropdown" id="profileDropdown">
						<img src="lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
							alt="User Image" style="width: 40px; height: 40px;" />
						<span class="ml-2">Eliyani Safitri</span>
						<!-- Teks biasa di samping gambar -->
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown"
						aria-labelledby="profileDropdown">
						<a href="/logout" class="dropdown-item" id="logout-link">
							<i class="ti-power-off text-primary"></i>
							Logout
						</a>
					</div>
				</li>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search"
							placeholder="Search" aria-label="Search" />
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
						role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
															with font-awesome or any other icon font library -->
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="right fas fa-table"></i>
								<p>
									CRUD DATA
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
								<li class="nav-item">
									<a href="{{ url('pemasok') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Pemasok</p>
									</a>
								</li>
								<li>
									<a href="{{ url('satuan') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Satuan</p>
									</a>
								</li>
						</li>
						<li class="nav-item">
							<a href="{{ url('kategori') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Kategori</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('stok') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Daftar Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('beli') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Daftar Pembelian</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('penjualan') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Daftar Penjualan</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ url('pelanggan') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pelanggan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('mutasi') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Mutasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('kontak') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Kontak</p>
							</a>
						</li>
					</ul>
					</li>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard v3</h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v3</li>
							</ol>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-body">
										@yield('content')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2021
				<a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="d-none d-sm-inline-block float-right">
				<b>Version</b> 3.2.0
			</div>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
	</script>
	<!-- AdminLTE -->
	<script src="{{ url('lte/dist/js/adminlte.js') }}"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ url('lte/dist/js/demo.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ url('lte/dist/js/pages/dashboard3.js') }}"></script>
</body>

</html>
