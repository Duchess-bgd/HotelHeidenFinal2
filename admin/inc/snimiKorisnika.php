<?php
include('../a_baza.php');

if(isset($_POST['snimi'])) {
  $id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id osobe!");
  $user_type = htmlspecialchars($_POST['user_type']);
  $name = htmlspecialchars($_POST['name']);
  $surname = htmlspecialchars($_POST['surname']);
  $personal_id = htmlspecialchars($_POST['personal_id']);
  $address = htmlspecialchars($_POST['address']);
  $city = htmlspecialchars($_POST['city']);
  $email = htmlspecialchars($_POST['email']);
  $tel = htmlspecialchars($_POST['tel']);

  $db->snimiKorisnika($id, $user_type, $name, $surname, $personal_id, $address, $city, $email, $tel);
}