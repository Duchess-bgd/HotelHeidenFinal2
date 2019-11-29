<?php


function room_info($t){
	global $db;
	$naslovi = $db->naslovi($t);

?>

<div class="photo-gallery" id = "<?=$naslovi[0]["type"]?>" >
	<div class="container fluid" id="facilities" >
		<div class="intro"  >
			<p class="text-center">  </p>
		</div>
<?php
foreach ($naslovi as $red) 

?>


		<h2 class="mt-5 pt-5"> <?= $red["type"]?></h2> 
		<div class="row col-lg-12">

<?php 

foreach ($naslovi as $red) {
?>
		<p class="col-lg-6 mt-5"><i><?= $red["description"]?></i></p>

          <?php	} ?>
			<div class="row photos col-lg-6">
					<?php
					$slike = $db->slike($t);
					$i=0;
					$cl=["col-sm-6 col-md-6 col-lg-6","col-sm-6 col-md-3 col-lg-3","col-sm-6 col-md-5 col-lg-5", "col-sm-6 col-md-6 col-lg-6","col-sm-6 col-md-7 col-lg-7","col-sm-6 col-md-4 col-lg-4"];
				
						foreach ($slike as $red) {
					
						 ?>
					
						<div class="<?= $cl[$i]?> item">
							<a href="slike/<?= $red['img']?>" data-lightbox="photos">
							<img class="img-fluid m-1 rounded-lg" src="slike/<?= $red['img']?>" alt="nece">
						</a>
					</div>
					
					<?php $i++; } ?>			
			</div>
				<hr class="bg-dark">

		</div>
	</div>
</div>

						<?php } ?>