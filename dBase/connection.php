<?php 
try {
	$hostname='localhost';
	$database='7474';
	$User_name='root';$password='';
	$bd = new PDO('mysql:host ='.$hostname.';dbname='.$database,$User_name,$password);
$bd->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	
} catch ( PDOexception $e) {
	require("imposible.php");
	die();
	
}

 header("locattion:pageIndex");
?>