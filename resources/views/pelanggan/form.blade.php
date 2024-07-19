@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Pelanggan</h1>
				<form method="POST" action="{{ url('pelanggan') }}">
					@csrf

					<div class="row mb-3">
						<label for="kode" class="col-sm-12 col-form-label">Kode</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="kode" id="kode"
								required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="nama" class="col-sm-12 col-form-label">Nama</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" id="nama"
								required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="alamat" class="col-sm-12 col-form-label">Alamat</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="alamat" id="alamat"
								required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="hp" class="col-sm-12 col-form-label">HP</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="hp" id="hp"
								required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="top" class="col-sm-12 col-form-label">TOP</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="top" id="top"
								required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/pelanggan') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
