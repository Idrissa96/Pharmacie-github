<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
require("../dBase/connection.php");
 require("fonctions/select_Insert.php");
 $text= explode(",",$_POST['donne']);
 $i=1;
 $req="Code_Cat=".$text[0];
 while(isset($text[$i]))
 {
 	if($text[$i]!=',')
 	$req= $req." or Code_Cat=".$text[$i];
 	$i++;
} ?>
<div class="form-group">
<label>Produit<span class="text-danger"><span></label>
<select   >
     
<option value="Liste_article_requette_cat" ></option>
<?php foreach( article_categorie(47) as $Art) {
    ?>
<option value="<?=$Art->Code_Art?>" ><?= strtoupper(  $Art->Lib_Art." ".$Art->Lib_Dos )?></option>
<?php } ?>
</select>
</div>
  <script src="../vendor/select/js/bootstrap-select.js"></script>
</body>
</html>