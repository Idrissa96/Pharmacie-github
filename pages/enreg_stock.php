<?php 
require("../dBase/connection.php");
 require("./fonctions/select_Insert.php");
Enregistre_stock($_POST['AppID'],$_POST['ID'],$_POST['Quant'],$_POST['date'],'RAS');
return true;?>