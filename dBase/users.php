<?php 
//utilisateur ...
function Verifi_user($donne1,$donne2)
{
	global $bd;
	$resul=array();
	$req=$bd->query("SELECT * FROM utilisateur where Login_user='$donne1' and Mpasse='$donne2' ");
	$resul=$req->fetch();
return $resul;
     
}
function user(){ 
  global $bd;
  $req=$bd->query("SELECT * FROM utilisateur where id_user =2 ");
  $resul=$req->fetch();
return $resul;
}

?>