<?php  

include_once "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">

<div class=" m-5 pl-5 text-danger d-flex justify-content-center"><p><?php
			if(isset($_SESSION['greska'])){
			echo $_SESSION['greska'];
			unset($_SESSION['greska']);
			}	
		?></p></div>

	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="">

				<div class="header">
				<h2>LogIn</h2>
				</div>

				<form class="forma" method="get" action="check_log.php">
					<?php  /* echo display_error();  proveritit da li ovo treba */  ?>
					<div class="input-group">
						<label>Email</label>
						<input type="email" name="email" value="">
					</div>
					<div class="input-group">
						<label>Password</label>
						<input type="password" name="password">
					</div>
					<input class="btn" type="submit" value="LogIn" name="login_btn"></input>
				</form>

			

</div>
	</div>

	<div class="col-md-6 mx-auto">

	<div class="">
		<div class="header">
			<h2>Register</h2>
		</div>
	<form class="forma" method="post" action="check_log.php">
		<input type="hidden" name="role" value="0"></input>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input  required type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input  required type="password" name="password_2">
		</div>

		<div class="input-group">
			<label>First Name</label>
			<input  required type="text" name="firstname">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input  required type="text" name="lastname">
		</div>
		<div class="input-group">
			<label>Personal ID</label>
			<input  required type="text" name="personal_id">
		</div>
		<div class="input-group">
			<label>City</label>
			<input  required type="text" name="city">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input  required type="text" name="address">
		</div>
		<div class="input-group">
			<label>Country</label>
			<input  required type="text" name="country">
		</div>
		<div class="input-group">
			<label>Telephone</label>
			<input  required type="text" name="telephone">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
	</form>
		</div>
	</div>
</div>

	<?php
	
	include_once "footer.php";
	
	?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>