<?php 

require("connection.php");
require("users.php");
$m=md5($_POST['mps']);
//die($m);
$donnes=Verifi_user($_POST['login'],$m);
if ($donnes['Id_user']){
	session_start();
	$donnes= user();
	$_SESSION['ID']=$donnes['Id_user'];
	$_SESSION['Nom_user']=$donnes['Nom_user'];
	$_SESSION['Pr_user']=$donnes['Prenom_user'];
	$_SESSION['login']=$donnes['Login_user'];
	$_SESSION['mpasse']=$donnes['Mpasse'];
	header("location:../");
	
}else{
	header("location:../login.php?Erreur=710");
}
?>