@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Data Barang</h2>
	<a href="{{ url('/welcome') }}" class="btn btn-secondary mb-2">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
	<a href="{{ url('/stok/create') }}" class="btn btn-success mb-2">
		<i class="fas fa-plus"></i> Tambah data barang
	</a>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>Kode</th>
					<th>Nama Barang</th>
					<th>Satuan</th>
					<th>Kategori</th>
					<th>Stok Awal</th>
					<th>Stok Akhir</th>
					<th>Harga Modal</th>
					<th>Harga Jual</th>
					<th>Foto</th>
					<th>Description</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$rec = DB::table('tbstok')->join('tbsatuan', 'tbstok.idsatuan', '=', 'tbsatuan.id')->join('tbkategori', 'tbstok.idkategori', '=', 'tbkategori.id')->select('tbstok.*', 'tbsatuan.nama AS idsatuan', 'tbkategori.nama AS idkategori')->get();
				
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->kode }}</td>
						<td>{{ $value->nama }}</td>
						<td class="text-center">{{ $value->idsatuan }}</td>
						<td class="text-center">{{ $value->idkategori }}</td>
						<td class="text-center">{{ $value->saldoawal }}</td>
						<td class="text-center">{{ $value->saldoakhir }}</td>
						<td class="text-center">{{ $value->hargamodal }}</td>
						<td class="text-center">{{ $value->hargajual }}</td>
						<td style="text-align: center;">
							<?php $fotos = json_decode($value->foto, true); ?>
							@if (is_array($fotos))
								@foreach ($fotos as $foto)
									<img src="{{ asset($foto) }}" height="75" width="65"
										class="mr-2" />
								@endforeach
							@else
								<img src="{{ asset('uploads/stok/' . $value->foto) }}" height="75"
									width="65" />
							@endif
							{{-- <img src="{{ asset('uploads/stok/' . $value->foto) }}" height="75"
								width="65" /> --}}
						</td>
						<td class="text-justify">{{ $value->desc }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
								data-target="#editStokModal{{ $value->id }}">
								<i class="fas fa-edit"></i> Edit
							</a>
							<a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
								data-target="#deleteStokModal{{ $value->id }}">
								<i class="fas fa-trash-alt"></i> Delete
							</a>
						</td>
					</tr>

					<!-- Modal Edit Barang -->
					<div class="modal fade" id="editStokModal{{ $value->id }}"
						tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Form edit data barang -->
									<form method="POST" action="{{ url('stok/' . $value->id) }}"
										enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="mb-3">
											<label for="kode" class="form-label">Kode</label>
											<input type="number" class="form-control" name="kode"
												value="{{ $value->kode }}" required>
										</div>
										<div class="mb-3">
											<label for="nama" class="form-label">Nama Barang</label>
											<input type="text" class="form-control" name="nama"
												value="{{ $value->nama }}" required>
										</div>

										<div class="mb-3">
											<label for="idsatuan" class="form-label">Satuan</label>
											<!-- Tambah bagian ini untuk dropdown nama satuan -->
											<select class="form-control" name="idsatuan" required>
												<?php
												$satuan = DB::table('tbsatuan')->get();
												?>
												@foreach ($satuan as $row)
													<option value="{{ $row->id }}"
														{{ $row->id === $value->idsatuan ? 'selected' : '' }}>
														{{ $row->nama }}
													</option>
												@endforeach
											</select>
										</div>

										<div class="mb-3">
											<label for="idkategori" class="form-label">Nama Kategori</label>
											<!-- Tambah bagian ini untuk dropdown nama kategori -->
											<select class="form-control" name="idkategori" required>
												<?php
												$kategori = DB::table('tbkategori')->get();
												?>
												@foreach ($kategori as $row)
													<option value="{{ $row->id }}"
														{{ $row->id === $value->idkategori ? 'selected' : '' }}>
														{{ $row->nama }}
													</option>
												@endforeach
											</select>
										</div>

										<div class="mb-3">
											<label for="saldoawal" class="form-label">Saldo Awal</label>
											<input type="number" class="form-control" name="saldoawal"
												value="{{ $value->saldoawal }}" required>
										</div>

										<div class="mb-3">
											<label for="saldoakhir" class="form-label">Saldo Akhir</label>
											<input type="number" class="form-control" name="saldoakhir"
												value="{{ $value->saldoakhir }}" required>
										</div>

										<div class="mb-3">
											<label for="hargamodal" class="form-label">Harga Modal</label>
											<input type="number" class="form-control" name="hargamodal"
												value="{{ $value->hargamodal }}" required>
										</div>

										<div class="mb-3">
											<label for="hargajual" class="form-label">Harga Jual</label>
											<input type="number" class="form-control" name="hargajual"
												value="{{ $value->hargajual }}" required>
										</div>

										<div class="mb-3">
											<label for="foto" class="form-label">Foto</label>
											{{-- <img src="{{ asset('uploads/stok/' . $value->foto) }}"
												class="img-thumbnail" width="100" height="100"> --}}
											<input type="file" class="form-control" name="foto[]" multiple
												required>
										</div>
										<div class="mb-3">
											<label for="desc" class="form-label">Description</label>
											<input type="text" class="form-control" name="desc"
												value="{{ $value->desc }}" required>
										</div>
										<button type="submit" class="btn btn-primary">Simpan
											Perubahan</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal Delete Barang -->
					<div class="modal fade" id="deleteStokModal{{ $value->id }}"
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
									Apakah Anda yakin ingin menghapus data barang ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Batal</button>
									<a href="{{ url('deleteStok/' . $value->id) }}"
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
