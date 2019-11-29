<section class="mg-best-rooms">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 p-4">
						<div class="mg-sec-title undefined">
							<h2>Our Best Rooms</h2>
							<p>These best rooms chosen by our customers</p>
						</div>

					<div class="row justify-content-center bg-none p-4">
					<?php
					$redovi = $db->podaci_soba();
					foreach ($redovi as $red) {?>

							<div class="card col-md-4 p-4">
								<img src="slike/<?= $red['img'] ?>" class="card-img-top" alt="imgs1">
								<div class="card-body bckg-dark">
								  <h5 class="card-title"><?= $red['type'] ?></h5>
								  <p class="card-text">from <?= $red['price'] ?>€ per night</p>
								  <a href="rooms.php#<?= $red['type'] ?>" class="btn btn-primary">View Details</a>
								</div>
							</div>

					<?php
				} ?>

					</div>
		</section>
