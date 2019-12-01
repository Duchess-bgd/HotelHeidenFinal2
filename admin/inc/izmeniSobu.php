<?php
include('../a_baza.php');

if(isset($_POST['snimi'])) {
  $id = (isset($_GET['id'])) ? $_GET['id'] : die("Nije unet id sobe!");
  $roomNo = htmlspecialchars($_POST['roomNo']);
  $roomtype = htmlspecialchars($_POST['roomtype']);
  $view = htmlspecialchars($_POST['view']);
  $roomsPrice = htmlspecialchars($_POST['roomsPrice']);

  $db->izmeni($id, $roomNo, $roomtype, $view, $roomsPrice);
}