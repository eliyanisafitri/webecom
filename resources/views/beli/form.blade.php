@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Data Pembelian</h1>
				<form method="POST" action="{{ url('beli') }}">
					@csrf

					<div class="row mb-3">
						<label for="nobukti" class="col-sm-12 col-form-label">No Bukti</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="nobukti" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="idpemasok" class="col-sm-12 col-form-label">Nama
							Pemasok</label>
						<div class="col-sm-12">
							<select class="form-control" name="idpemasok" required>
								<?php
								$beli = DB::table('tbpemasok')->get();
								?>
								@foreach ($beli as $row)
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
						<label for="nama" class="col-sm-12 col-form-label">Nama Barang</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="harga" class="col-sm-12 col-form-label">Harga</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="harga" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="qty" class="col-sm-12 col-form-label">QTY</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="qty" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="total" class="col-sm-12 col-form-label">Total</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="total" required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/beli') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
