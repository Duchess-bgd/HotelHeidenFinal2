<?php

include_once "baza.php";
include_once "menu.php";

$rez = $db->your_reservations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">	
  <link rel="stylesheet" href="css/style1.css">	
</head>
<body>

<div class="container-fluid mt-5 mb-5">
  <h2 class="m-5 p-5">Room reservation</h2>
  <p class="text-light m-5">Please choose one of the available options:</p>            
  <table class="table mb-5">
    <thead>
      <tr class="text-light">
        <th>Check In</th>
        <th>Check Out</th>
        <th>Room type</th>
        <th>Description</th>
        <th>Number of guests</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody class="text-light">

<?php
    foreach ($rez as $red){ ?>
      <tr> 
        <td class="d1"><?=$red["d1"]?></td>
        <td class="d2"><?=$red["d2"]?></td>
        <td class="t"><?=$red["type"]?></td>
        <td class="d"><?=$red["description"]?></td>
        <td class="bg"><?=$red["guests"]?></td>
        <td class="p"><?=$red["price"] ?></td>
        <td><button class="btn-primary p-2 rounded-lg cancel" data-id="<?=$red['id']?>">CANCEL</button></td>
      </tr>

      <?php } ?>

    </tbody>
  </table>
</div>

<hr class="m-5">
<hr class="m-5">
<?php
include_once "footer.php";

?>

<script src="js/cancel.js"></script>
</body>
</html>
