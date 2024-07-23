@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Data Barang</h1>
				<form method="POST" action="{{ url('stok') }}" enctype="multipart/form-data">
					@csrf

					<div class="row mb-3">
						<label for="kode" class="col-sm-12 col-form-label">Kode</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="kode" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="nama" class="col-sm-12 col-form-label">Nama Barang</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="idsatuan" class="col-sm-12 col-form-label">Nama Satuan</label>
						<div class="col-sm-12">
							<select class="form-control" name="idsatuan" required>
								<?php
								$satuan = DB::table('tbsatuan')->get();
								?>
								@foreach ($satuan as $row)
									<option value="{{ $row->id }}">{{ $row->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="idkategori" class="col-sm-12 col-form-label">Nama
							Kategori</label>
						<div class="col-sm-12">
							<select class="form-control" name="idkategori" required>
								<?php
								$kategori = DB::table('tbkategori')->get();
								?>
								@foreach ($kategori as $row)
									<option value="{{ $row->id }}">{{ $row->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>

					{{-- <div class="row mb-3">
						<label for="saldoawal" class="col-sm-12 col-form-label"> Saldo Awal</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="saldoawal" required>
						</div>
					</div> --}}

					<div class="row mb-3">
						<label for="saldoakhir" class="col-sm-12 col-form-label"> Saldo
							Akhir</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="saldoakhir" required>
						</div>
					</div>

					{{-- <div class="row mb-3">
						<label for="hargabeliakhir" class="col-sm-12 col-form-label"> Harga Beli
							Akhir</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="hargabeliakhir" required>
						</div>
					</div> --}}

					<div class="row mb-3">
						<label for="hargamodal" class="col-sm-12 col-form-label"> Harga
							Modal</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="hargamodal" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="hargajual" class="col-sm-12 col-form-label"> Harga Jual</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="hargajual" required>
						</div>
					</div>

					{{-- <div class="row mb-3">
						<label for="tglexp" class="col-sm-12 col-form-label"> Tanggal
							Expired</label>
						<div class="col-sm-12">
							<input type="date" class="form-control" name="tglexp" required>
						</div>
					</div> --}}


					<div class="row mb-3">
						<label for="foto" class="col-sm-12 col-form-label"> Foto</label>
						<div class="col-sm-12">
							{{-- <input type="file" class="form-control" name="foto" id="foto"
								required> --}}
							<input type="file" class="form-control" name="foto[]" id="foto"
								multiple required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="desc" class="col-sm-12 col-form-label"> Description
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="desc" required>
						</div>
					</div>

					{{-- <div class="row mb-3">
						<label for="pajang" class="col-sm-12 col-form-label"> Pajang </label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="pajang" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="saldoakhir" class="col-sm-12 col-form-label"> Saldo
							Akhir</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" name="saldoakhir" required>
						</div>
					</div> --}}

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/stok') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
