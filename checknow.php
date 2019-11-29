<?php

include_once "baza.php";
include_once "menu.php";

$d1 = $_GET['d1'] ?? '';
$d2 = $_GET['d2'] ?? '';
if($d1 =='' || $d2 ==''){
  die('die bitch with no dates!');  //naravno ovo promeni u something appropriate
}
$d1 = new DateTime($d1);
$d2 = new DateTime($d2);
$bg = $_GET['broj-gostiju'] ?? 1;
$ts = $_GET['tip-sobe'] ?? '';
 $sd1=$d1->format('Y/m/d');
    $sd2=$d2->format('Y/m/d');

    //echo json_encode($d1); 
    $rez = $db->check_room_availability($d1, $d2, $bg, $ts);
    //echo json_encode($rez); 
    
    //echo json_encode($d2); 

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
        <td class="d1"><?=$sd1?></td>
        <td class="d2"><?=$sd2?></td>
        <td class="t"><?=$red["type"]?></td>
        <td class="d"><?=$red["description"]?></td>
        <td class="bg"><?=$bg?></td>
        <td class="p"><?=$red["price"] ?></td>
        <td><button class="btn-primary p-2 rounded-lg confirm" data-rid="<?=$red['room_info_id']?>">Confirm</button></td>
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

<script src="js/confirm.js"></script>
</body>
</html>
