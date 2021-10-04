<?php 
require("../dBase/connection.php");
 require("./fonctions/select_Insert.php");
Modification_stock($_POST['ID'],$_POST['Quant'],$_POST['date']);
return true;?>