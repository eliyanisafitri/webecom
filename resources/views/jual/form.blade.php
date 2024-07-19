@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Data Penjualan</h1>
				<form method="POST" action="{{ url('jual') }}">
					@csrf

					<div class="row mb-3">
						<label for="nobukti" class="col-sm-12 col-form-label">No Bukti</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="nobukti" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="idpelanggan" class="col-sm-12 col-form-label">Nama
							Pelanggan</label>
						<div class="col-sm-12">
							<select class="form-control" name="idpelanggan" required>
								<?php
								$jual = DB::table('tbpelanggan')->get();
								?>
								@foreach ($jual as $row)
									<option value="{{ $row->id }}">{{ $row->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="tgl" class="col-sm-12 col-form-label">Tanggal</label>
						<div class="col-sm-12">
							<input type="date" class="form-control" name="tgl" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="ket" required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/jual') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
