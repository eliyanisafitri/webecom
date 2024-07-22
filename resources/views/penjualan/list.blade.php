@extends('welcome')
@section('content')
	<h2 style="text-align: center; font-weight: bold;">Jual</h2>
	<div class="table-responsive">
		<table class="table-bordered table-striped table">
			<thead class="table-info">
				<tr style="text-align: center; font-weight: bold;">
					<th>No</th>
					<th>Nomor Resi</th>
					<th>Nama Customers</th>
					<th>Produk</th>
					<th>Total</th>
					<th>No Hp</th>
					<th>Alamat</th>
					<th>Foto Bukti</th>
					<th>Status</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$no = 1;
				$rec = DB::table('tbchekout')->join('users', 'tbchekout.id_user', '=', 'users.id')->join('tbstok', 'tbchekout.idstok', '=', 'tbstok.id')->select('tbchekout.*', 'users.name AS nama_users', 'tbstok.nama AS nama_stok')->get();
				?>
				@foreach ($rec as $value)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
						<td class="text-center">{{ $value->nobukti }}</td>
						<td class="text-center">{{ $value->nama_users }}</td>

						@php
							$id_users = $value->id_user;
							$product = DB::table('tbcart')

							    ->join('tbstok', 'tbcart.idstok', '=', 'tbstok.id')
							    ->select('tbstok.nama', 'tbcart.qty')
							    ->where('id_user', $id_users)
							    ->get();

						@endphp



						<td class="text-center">
							@foreach ($product as $item)
								<li>{{ $item->nama }} ({{ $item->qty }})</li>
							@endforeach


						</td>


						<td class="text-center">{{ $value->total }}</td>
						<td class="text-center">{{ $value->nohp }}</td>
						<td class="text-center">{{ $value->alamat }}</td>
						<td class="text-center"><img
								src="{{ asset('storage/' . $value->fotobayar) }}" height="75"
								width="65" class="mr-2"></td>
						<td class="text-center">{{ $value->status }}</td>
						<td>
							<form action="{{ url('penjualan/' . $value->id) }}" method="POST">
								@csrf
								<input type="hidden" name="id_user" value="{{ $value->id_user }}">
								@method('PUT')

								<button class="btn btn-success" type="submit">Konfirmasi</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
