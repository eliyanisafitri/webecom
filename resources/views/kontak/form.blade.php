@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Kontak</h1>
				<form method="POST" action="{{ url('kontak') }}">
					@csrf
					@method('PUT')

					<div class="row mb-3">
						<label for="idpelanggan" class="col-sm-12 col-form-label">ID
							Pelanggan</label>
						<div class="col-sm-12">
							<select class="form-control" name="idpelanggan" required>
								<?php
								$pelanggan = DB::table('tbpelanggan')->get();
								?>
								@foreach ($pelanggan as $row)
									<option value="{{ $row->id }}">{{ $row->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="namakontak" class="col-sm-12 col-form-label">nama
							kontak</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="namakontak"
								id="namakontak" required>
						</div>
					</div>
					<div class="row mb-3">
						<label for="hp" class="col-sm-12 col-form-label">hp</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="hp" id="hp"
								required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/kontak') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
