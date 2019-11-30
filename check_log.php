<?php 
include_once "baza.php";


function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

function isAdmin() 
{
	if (isset($_SESSION['user']) && $_SESSION['user_type'] == '1' ) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['login_btn'])) {
	login();
}
if (isset($_POST['register_btn'])) {
	register();
}



function login(){
	global $db;

	$email = $_GET['email'];
	$pass = $_GET['password'];
	$rez = $db->loggedin($email, $pass);
	if(count($rez) > 0){
		$user_type = $rez[0]['user_type'];
		$_SESSION['user']  = $rez[0]['id'];
		$_SESSION['user_type'] = $user_type;
		if($user_type == 0)
			header('location: zivote.php');
		else
			header('location: admin/index.php');
	}else{
		greska("*Wrong email/password");
	}
}
function register(){
	
	global $db;

	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
    $password_2  =  $_POST['password_2'];
	$firstname    =  $_POST['firstname'];
	$lastname    =  $_POST['lastname'];
	$city    =  $_POST['city'];
	$country    =  $_POST['country'];
	$address    =  $_POST['address'];
	$telephone    =  $_POST['telephone'];
	$personal_id    =  $_POST['personal_id'];
	$user_type = $_POST['role'];
    
    
	if ($password_1 != $password_2) {
		greska("Passwordi nisu isti");

	}
	//skinite regex za mail

	if (!preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email)){
		greska("unesite tačan email");
	}
	

	$rez = $db->novi_korisnik($firstname, $lastname, $personal_id, $address, $city, $country, $password_1, $email, $telephone, $user_type);
	if($rez == true){
		$_SESSION['user']  = $db->getLastId();
		$_SESSION['user_type'] = $user_type;
		if($user_type == 0)
			header('location: zivote.php');
		else 
			header('location: ../admin/index.php');
	}else{
		greska("Postoji user sa tim emailom");
	}

}


function greska($str){
	$_SESSION['greska'] = $str;
	header('location: register.php');
}



    ?>
