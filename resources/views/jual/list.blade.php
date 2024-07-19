@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Jual</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('/jual/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah data
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>No Bukti</th>
					<th>Id Pelanggan</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('jual')->join('tbpelanggan', 'jual.idpelanggan', '=', 'tbpelanggan.id')->select('jual.*', 'tbpelanggan.nama AS idpelanggan')->get();
				
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->nobukti }}</td>
						<td class="text-center">{{ $value->idpelanggan }}</td>
						<td class="text-center">{{ $value->tgl }}</td>
						<td class="text-center">{{ $value->ket }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editJualModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deleteJualModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit Jual -->
					<div class="modal fade" id="editJualModal{{ $value->id }}" tabindex="-1"
						role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Jual</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data jual -->
									<form method="POST" action="{{ url('jual/' . $value->id) }}">
										@csrf
										@method('PUT')
										<div class="mb-3">
											<label for="nobukti" class="form-label">Nomor Bukti</label>
											<input type="number" class="form-control" name="nobukti"
												value="{{ $value->nobukti }}" required>
										</div>

										<div class="mb-3">
											<label for="idpelanggan" class="form-label">Nama Pelanggan</label>
											<!-- Tambah bagian ini untuk dropdown nama pelanggan -->
											<select class="form-control" name="idpelanggan" required>
												<?php
												$jual = DB::table('tbpelanggan')->get();
												?>
												@foreach ($jual as $row)
													<option value="{{ $row->id }}"
														{{ $row->id === $value->idpelanggan ? 'selected' : '' }}>
														{{ $row->nama }}
													</option>
												@endforeach
											</select>
										</div>

										<div class="mb-3">
											<label for="tgl" class="form-label">Tanggal</label>
											<input type="date" class="form-control" name="tgl"
												value="{{ $value->tgl }}" required>
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
					<!-- Modal Delete Jual -->
					<div class="modal fade" id="deleteJualModal{{ $value->id }}"
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
									Apakah Anda yakin ingin menghapus data Penjualan ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deleteJual/' . $value->id) }}"
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
