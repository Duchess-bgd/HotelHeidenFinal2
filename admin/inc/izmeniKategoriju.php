<?php
include('../a_baza.php');

if(isset($_POST['snimi'])) {
  $id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id kategorije!");
  $description = htmlspecialchars($_POST['description']);

  $db->promeniOpisKategorije($id, $description);
}