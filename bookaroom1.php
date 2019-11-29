
<script>


	function validateForm() {
		var x = new Date(document.forms["booking"]["d1"].value);
		var y = new Date(document.forms["booking"]["d2"].value);

		var d = new Date( );

		
		if (x.getTime() < d.getTime() || y.getTime() <= d.getTime() || y.getTime() <= x.getTime() )
			return false;
			else 
			return true;
		}


</script>



<section class="book sticky-top col-sm-11" id="stiki">
			<div class="container m-0 p-1 pl-1 justify-content-right" >
				<div class="row">
				
					<div class="mt-0">
						
						<div class="d-flex">
						<nav class="navbar navbar-expand-lg navbar-light bg-providno d-flex p-1 mb-1" id="navOnScroll">
							<button class="mb-3 navbar-toggler p-2" type="button" data-toggle="collapse" data-target="#navbarBooking" aria-controls="navbarBooking" aria-expanded="false" aria-label="Toggle navigation">
							  <span class="p-2 sel">Book a Room</span>
							</button>

							
							<form class="list-unstyled mr-auto collapse navbar-collapse" name="booking" id="navbarBooking" action="checknow.php" method="GET" onsubmit="return validateForm()">
								<div class="row">
								<div class="col-sm-4 col-lg-3">
										<div class="input-group date mg-check-in sel">
											<div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
											<input class="form-control sel" type="date" name="d1"  placeholder="Check In" autocomplete="off" required>
										</div>
									</div>
									<div class="col-sm-4 col-lg-3">
										<div class="input-group date mg-check-out sel">
											<div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
											<input class="form-control sel" type="date" name="d2"  placeholder="Check Out" autocomplete="off" required>
										</div>
									</div>
											<div class="col-sm-3 col-lg-1">
												<select class="cs-select cs-skin-elastic p-2 ml-1 mr-5 sel" name="broj-gostiju" required>
													<option value="" disabled selected>Guest</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
												</select>
											</div>
											<div class="col-sm-3 col-lg-1">
												<select class="cs-select cs-skin-elastic p-2 ml-3 mr-5 sel" name="tip-sobe">
													<option value="" disabled selected>Room</option>
													<option value="1">Standard</option>
													<option value="2">Deluxe</option>
													<option value="3">Apartment</option>
												</select>
											</div>
									<div class="col-sm-4 col-lg-3 pl-5 ml-5">
									<button class="btn btn-main btn-block sel bg-light text-dark-50 book-btn" type="submit" value="submit">Check Now</button>
									</div>
								</div>
								
							</form>
						</nav>
					</div>
					</div>
				</div>
			</div>
		</section>



 
