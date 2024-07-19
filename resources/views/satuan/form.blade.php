@extends('welcome')
@section('content')
	<div class="container">
		<div class="card my-5" style="background-color: #cfe2f3;">
			<div class="card-body">
				<h1 class="mb-4 text-center">Form Input Hari</h1>
				<form method="POST" action="{{ url('satuan') }}">
					@csrf

					<div class="row mb-3">
						<label for="kode" class="col-sm-12 col-form-label">Nama Satuan</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" id="nama"
								required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<button type="submit" class="btn btn-success me-2">Submit</button>
							<a href="{{ url('/satuan') }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
@endsection
