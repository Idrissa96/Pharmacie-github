<?php 
require("../../dBase/connection.php");
require('fonctions2.php');
if (isset($_POST['Modif_Camion'])){
	modification_Camion($_POST['immat'],$_POST['type'],$_POST['cap'],$_POST['et']);
    if($_POST['veri']!=$_POST['CH'])Enregistre_affectation($_POST['CH'],$_POST['immat']);
    echo "<script language='javascript'> window.location.href ='../index.php?page=MesCamion'</script>";
	

}elseif (isset($_POST['Transport'])) {
	modification_Transport($_POST['ca'],$_POST['cl'],$_POST['dp'],$_POST['ds'],$_POST['ma'],$_POST['fr'],$_POST['cb'],$_POST['va'],$_POST['dt'],$_POST['Id_T']);
           echo "<script language='javascript'> window.location.href ='../index.php?page=Transport'</script>";
}elseif (isset($_POST['REPARATION'])) {
	modification_Reparation($_POST['ty'],$_POST['dsc'],$_POST['co'],$_POST['caa'],$_POST['dat'],$_POST['id_Rep']);
	echo "<script language='javascript'> window.location.href ='../index.php?page=Reparation'</script>";
}elseif(isset($_POST['Chauffeur'])) {
	 modification_driver($_POST['nm'],$_POST['pnm'],$_POST['cat'],$_POST['tel'],$_POST['idC']);
	 echo "<script language='javascript'> window.location.href ='../index.php?page=chauffeur'</script>";
}elseif (isset($_POST['ASSMODIF'])) {
	modification_Assurance($_POST['ASSA'],$_POST['MaisonA'],$_POST['immat'],$_POST['DV'],$_POST['DE'],$_POST['IDA']);
	echo "<script language='javascript'> window.location.href ='../index.php?page=Assuance_Camion'</script>";
}elseif (isset($_POST['modifi_client'])) {
	 modification_Client($_POST['lib'],$_POST['cap'],$_POST['Ncompte']);
	 echo "<script language='javascript'> window.location.href ='../index.php?page=Mesclients'</script>";
}elseif (isset($_POST['MODIFI_Verqme'])) {
	 modification_Versement($_POST['Mt'],$_POST['TT'],$_POST['dateV'],$_POST['type'],$_POST['id_vers']);
	echo "<script language='javascript'> window.location.href ='../index.php?page=versement&ClientP=".$_POST['ClientP']."'</script>";
}
 ?>