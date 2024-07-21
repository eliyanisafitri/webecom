@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Mutasi</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('/mutasi/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah data
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>No Bukti</th>
					<th>Nama Barang</th>
					<th>Quantity</th>
					<th>Harga</th>
					<th>Keterangan</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('mutasi')->join('tbstok', 'mutasi.idstok', '=', 'tbstok.id')->select('mutasi.*', 'tbstok.nama AS idstok')->get();
				
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->nobukti }}</td>
						<td class="text-center">{{ $value->idstok }}</td>
						<td class="text-center">{{ $value->qty }}</td>
						<td class="text-center">{{ $value->harga }}</td>
						<td class="text-center">{{ $value->ket }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editMutasiModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deleteMutasiModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit Mutasi -->
					<div class="modal fade" id="editMutasiModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Mutasi</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data Mutasi -->
									<form method="POST" action="{{ url('mutasi/' . $value->id) }}">
										@csrf
										@method('PUT')
										<div class="mb-3">
											<label for="nobukti" class="form-label">Nomor Bukti</label>
											<input type="number" class="form-control" name="nobukti"
												value="{{ $value->nobukti }}" required>
										</div>

										<div class="mb-3">
											<label for="idstok" class="form-label">Nama stok</label>
											<!-- Tambah bagian ini untuk dropdown nama stok -->
											<select class="form-control" name="idstok" required>
												<?php
												$mutasi = DB::table('tbstok')->get();
												?>
												@foreach ($mutasi as $row)
													<option value="{{ $row->id }}"
														{{ $row->id === $value->idstok ? 'selected' : '' }}>
														{{ $row->nama }}
													</option>
												@endforeach
											</select>
										</div>

										<div class="mb-3">
											<label for="qty" class="form-label">Tanggal</label>
											<input type="number" class="form-control" name="qty"
												value="{{ $value->qty }}" required>
										</div>

										<div class="mb-3">
											<label for="harga" class="form-label">Tanggal</label>
											<input type="number" class="form-control" name="harga"
												value="{{ $value->harga }}" required>
										</div>

										<div class="mb-3">
											<label for="ket" class="form-label">Keterangan</label>
											<input type="text" class="form-control" name="ket"
												value="{{ $value->ket }}" required>
										</div>
										<button type="submit" class="btn btn-primary">Simpan
											Perubahan</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal Delete Mutasi -->
					<div class="modal fade" id="deleteMutasiModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan
									</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Apakah Anda yakin ingin menghapus data Mutasi ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deleteMutasi/' . $value->id) }}"
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
