<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register - Admin</title>
</head>

<body
	style="background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh;">

	<div
		style="width: 400px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 8px; text-align: left;">

		<h2 style="margin-bottom: 20px; text-align: center;">Admin baru?</h2>

		<form action="{{ url('auth/admin/register') }}" method="POST"
			style="margin-bottom: 20px;">
			@csrf

			<div style="display: flex; flex-direction: column; margin-bottom: 20px;">
				<label for="name" style="margin-bottom: 5px;">Nama</label>
				<input type="text"
					style="width: 100%; padding: 10px; box-sizing: border-box; margin-bottom: 10px;"
					id="name" name="name">
			</div>

			<div style="display: flex; flex-direction: column; margin-bottom: 20px;">
				<label for="email" style="margin-bottom: 5px;">Email</label>
				<input type="email"
					style="width: 100%; padding: 10px; box-sizing: border-box; margin-bottom: 10px;"
					id="email" name="email">
			</div>

			<div style="display: flex; flex-direction: column; margin-bottom: 20px;">
				<label for="password" style="margin-bottom: 5px;">Password</label>
				<input type="password"
					style="width: 100%; padding: 10px; box-sizing: border-box; margin-bottom: 10px;"
					id="password" name="password">
			</div>

			<button type="submit"
				style="width: 100%; padding: 10px; box-sizing: border-box; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">SIGN
				UP</button>
		</form>

		<div style="text-align: center;">
			Sudah Memiliki Akun? <a href="/login"
				style="color: #007bff; text-decoration: none;">Login</a>
		</div>

	</div>

</body>

</html>
