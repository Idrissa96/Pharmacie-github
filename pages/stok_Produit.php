<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="form-group" >
<?php 
require("../dBase/connection.php");
 require("fonctions/select_Insert.php"); ?>
<label>Stoct<i class="text-success"> &nbsp;non périmé </i></label>
<input type="text" id="stock"  class="form-control " onkeypress="chiffres(event)" disabled="" value="<?=number_format(stock_produit($_POST['donne']))?>"  >
</div>
</body>
</html>