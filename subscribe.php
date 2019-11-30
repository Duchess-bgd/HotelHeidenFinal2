<?php
include("baza.php");
?>
<style>body{color:white;}</style>


<?php
$email=$_POST['email'];

//regex za mail

if (empty($email)) {

    echo "The email address field must not be blank";
} elseif (!preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email)) {
    
    echo "You must fill the field with a valid email address";
}else{

    if($db->subscribe($email)){

        echo "You have been successfully subscribed";
        }else{
        echo "You are already subscribed";
        }

}



?>
