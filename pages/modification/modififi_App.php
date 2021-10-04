<?php 
require("../../dBase/connection.php");
 require("../fonctions/modification.php");                
modification_app($_POST['ID'],$_POST['four'],$_POST['ref'],$_POST['date'],$_POST['obr']);
return true;?>