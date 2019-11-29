<?php include_once ("check_log.php");

?>
<div class="bckg-dark d-flex justify-content-end" id="navOnScrollDiv">
	<nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-end p-2" id="navOnScroll">
		
		<button class="navbar-toggler bg-light collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="list-unstyled mr-auto nav-pills collapse navbar-collapse text-right" id="navbarSupportedContent">
			<li class="active nav-item m-3"><a href="zivote.php">Home</a></li>
			<li class="nav-item m-3"><a  href="zivote.php#about" role="button">About</a></li>
			<li class="nav-item m-3"><a  href="rooms.php" role="button">Rooms</a></li>
			<li class="nav-item m-3"><a href="zivote.php#gallery" role="button">Gallery</a></li>
			<li class="nav-item m-3"><a href="zivote.php#contact" role="button">Contact</a></li>
			<?php if(isLoggedIn()===false){?>
				<li class="nav-item m-3"></li>
			<?php }elseif(isAdmin()===false){ ?> 
				<li class="nav-item m-3"><a href="reservations.php">My Reservations</a></li>
			<?php }else{ ?> 
			<li class="nav-item m-3"><a href="admin/index.php">Admin area</a></li>
			<?php }?>


			<?php if(isLoggedIn()===false){?>
			<li class="nav-item m-3"><a href="register.php">Sign up/Log In</a></li>
						<?php }else{ ?>
			<li class="nav-item m-3"><a href="logout.php">Log Out</a></li>
			<?php }?>
			<li><a class="navbar-brand" href="zivote.php#about"><img src="slike/logo.png" alt="logo"></a></li>
		</ul>

	</nav>
</div>
