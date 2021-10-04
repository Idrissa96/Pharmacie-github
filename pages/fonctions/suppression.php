<?php 
require("../../dBase/connection.php");
require('fonctions2.php');
if (isset($_GET['Id_f'])){
	if(existe_offert_abo($_GET['Id_f'])==0){
		supprimer_formul($_GET['Id_f']);
     echo "<script language='javascript'> window.location.href ='../index.php?page=formul'</script>";
 }else{
 	echo "<script language='javascript'> alert('Impossible d\'effectuer cette operation !      Une table utilise cette donné')  </script>";
 	echo "<script language='javascript'> window.location.href ='../index.php?page=formul'</script>";
 }
}elseif(isset($_GET['id_abonnet'])){
		supprimer_abonnement($_GET['id_abonnet']);
     echo "<script language='javascript'> window.location.href ='../index.php?page=Abonnement'</script>";
}elseif(isset($_GET['IDCLIE'])){
	if(existe_cleint_deco($_GET['IDCLIE'])==0){
		supprimer_client($_GET['IDCLIE']);
     echo "<script language='javascript'> window.location.href ='../index.php?page=Mesclients'</script>";
 }else{
 	echo "<script language='javascript'> alert('Impossible d\'effectuer cette operation !      Une table utilise cette donné')  </script>";
 	echo "<script language='javascript'> window.location.href ='../index.php?page=Mesclients'</script>";
 }
}elseif(isset($_GET['SupDECO'])){
	if(existe_abonnement_deco($_GET['SupDECO'])==0){
		supprimer_decodeur($_GET['SupDECO']);
     echo "<script language='javascript'> window.location.href ='../index.php?page=Mesclients'</script>";
 }else{
 	echo "<script language='javascript'> alert('Impossible d\'effectuer cette operation !      Une table utilise cette donné')  </script>";
 	echo "<script language='javascript'> window.location.href ='../index.php?page=Mesclients'</script>";
 }
}?>