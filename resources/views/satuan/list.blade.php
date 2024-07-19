@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Data Satuan</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('/satuan/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah Data Satuan
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>Nama Satuan</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('tbsatuan')->get();
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->nama }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editSatuanModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deleteSatuanModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit hari -->
					<div class="modal fade" id="editSatuanModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Satuan</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data hari -->
									<form method="POST" action="{{ url('satuan/' . $value->id) }}">
										@csrf
										@method('PUT')
										<div class="mb-3">
											<label for="nama" class="form-label">Nama Satuan</label>
											<input type="text" class="form-control" name="nama"
												value="{{ $value->nama }}" required>
										</div>
										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Delete satuan -->
					<div class="modal fade" id="deleteSatuanModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan
										Satuan</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah Anda yakin ingin menghapus data satuan ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deleteSatuan/' . $value->id) }}"
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
