<?php 
include('a_baza.php');



foreach($db->svi_mejlovi() as $mail)
    mail($mail, $title, $message);




  
?>