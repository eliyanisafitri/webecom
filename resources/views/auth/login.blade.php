<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
</head>

<body
	style="background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh;">

	<div
		style="width: 400px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 8px; text-align: left;">

		<h2 style="margin-bottom: 20px; text-align: center;">Customer</h2>

		<form method="POST" action="/login" style="margin-bottom: 20px;">
			@csrf

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
				IN</button>
		</form>

		<div style="text-align: center;">
			Belum punya akun? <a href="/register"
				style="color: #007bff; text-decoration: none;">Daftar</a>
		</div>

	</div>

</body>

</html>
