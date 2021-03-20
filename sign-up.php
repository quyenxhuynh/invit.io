<!-- <body>
    <form action="action.php" method="post">
        <p>Your name: <input type="text" name="name" /></p>
        <p>Your age: <input type="text" name="age" /></p>
        <p><input type="submit" /></p>
    </form>
</body> -->

<!-- BASE TEMPLATE TO C/P TO NEW PAGES -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include("styles.html") ?>

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.html') ?>

	<div class="container">
		<h2>Create a New Account</h2>
		<p>
		<form action="action.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input id="username" name="username" class="form-control" type="text" placeholder="johndoe">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input id="password" name="password" class="form-control" type="password" placeholder="********">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Confirm Password</label>
				<div class="col-sm-10">
					<input id="password2" name="password2" class="form-control" type="password" placeholder="********">
				</div>
			</div>
            
			<button class="btn-blue-muted float-right px-4" type="submit">Sign Up</button>
		</form>
		</p>
	</div>

	<?php include('js.html') ?>
</body>

</html>