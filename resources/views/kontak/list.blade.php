@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Data Kontak</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('kontak/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah Data Kontak
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-primary">
				<tr style="text-align: center; font-weight: bold;">
					<td>No</td>
					<td>Nama Pelanggan</td>
					<td>Nama Kontak</td>
					<td>Nomor HP</td>
					<td class="text-center">Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('tbkontak')->join('tbpelanggan', 'tbkontak.idpelanggan', '=', 'tbpelanggan.id')->select('tbkontak.*', 'tbpelanggan.nama AS idpelanggan')->get();
				?>

				@foreach ($rec as $value)
					<tr>
						<td text align="center">{{ $no++ }}</td>
						<td>{{ $value->idpelanggan }}</td>
						<td>{{ $value->namakontak }}</td>
						<td text align="center">{{ $value->hp }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editKontakModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deletekontakModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit Kontak -->
					<div class="modal fade" id="editKontakModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Kontak</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data Kontak -->
									<form method="POST" action="{{ url('kontak/' . $value->id) }}">
										@csrf
										@method('PUT')

										<div class="mb-3">
											<label for="idpelanggan" class="form-label">Nama Pelanggan</label>
											<!-- Tambah bagian ini untuk dropdown nama pelanggan -->
											<select class="form-control" name="idpelanggan" required>
												<?php
												$pelanggan = DB::table('tbpelanggan')->get();
												?>
												@foreach ($pelanggan as $row)
													<option value="{{ $row->id }}"
														{{ $row->id == $value->idpelanggan ? 'selected' : '' }}>
														{{ $row->nama }}
													</option>
												@endforeach
											</select>

											<div class="mb-3">
												<label for="hp" class="form-label">No HP</label>
												<input type="number" class="form-control" name="hp"
													value="{{ $value->hp }}" required>
											</div>

											<button type="submit" class="btn btn-primary">Simpan
												Perubahan</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Delete Dosen -->
					<div class="modal fade" id="deletekontakModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan
										Kontak</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah Anda yakin ingin menghapus data kontak ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deletekontak/' . $value->id) }}"
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
