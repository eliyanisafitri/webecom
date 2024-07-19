@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Data Pelanggan</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('/pelanggan/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah Data Pelanggan
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>HP</th>
					<th>TOP</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('tbpelanggan')->get();
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->kode }}</td>
						<td class="text-center">{{ $value->nama }}</td>
						<td class="text-center">{{ $value->alamat }}</td>
						<td class="text-center">{{ $value->hp }}</td>
						<td class="text-center">{{ $value->top }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editPelangganModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deletePelangganModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit hari -->
					<div class="modal fade" id="editPelangganModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggank</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data hari -->
									<form method="POST" action="{{ url('pelanggan/' . $value->id) }}">
										@csrf
										@method('PUT')
										<div class="mb-3">
											<label for="kode" class="form-label">Kode</label>
											<input type="number" class="form-control" name="kode"
												value="{{ $value->kode }}" required>
										</div>
										<div class="mb-3">
											<label for="nama" class="form-label">Nama Pelanggan</label>
											<input type="text" class="form-control" name="nama"
												value="{{ $value->nama }}" required>
										</div>
										<div class="mb-3">
											<label for="alamat" class="form-label">HP</label>
											<input type="text" class="form-control" name="alamat"
												value="{{ $value->alamat }}" required>
										</div>
										<div class="mb-3">
											<label for="hp" class="form-label"></label>
											<input type="text" class="form-control" name="hp"
												value="{{ $value->hp }}" required>
										</div>
										<div class="mb-3">
											<label for="top" class="form-label">Top</label>
											<input type="text" class="form-control" name="top"
												value="{{ $value->top }}" required>
										</div>
										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Delete Hari -->
					<div class="modal fade" id="deletePelangganModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan
										Pelanggan</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah Anda yakin ingin menghapus data Pelanggan ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deletePelanggan/' . $value->id) }}"
										class="btn btn-danger">Hapus</a>
								</div>
							</div>
						</div>
					</div>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
