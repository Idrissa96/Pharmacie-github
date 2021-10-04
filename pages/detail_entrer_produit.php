<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	  <table  class="table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8em">
        <thead>
            <tr style="background: rgba(0,0,0,0.2);">
                <th>Produit</th>
                <th>Quantité Réçu</th>
                <th>Date de Péremption</th>
            </tr>
        </thead>
        <tbody>
        <?php 
require("../dBase/connection.php");
 require("fonctions/select_Insert.php"); 
 function date_fr2($d1){
    ///date en format jj/M/A
    return(implode('/', array_reverse(explode('-',$d1))));
 }
            foreach( Liste_prodduit_App($_POST['donne']) as $list) {?>
            <tr  style="background: rgba(255,255,255);">
                <td width="50%"><?= $list->Lib_Art?></td>
                <td width="25%"><?= $list->Quant+Quantité_tfr_produit($list->ID)?></td>
                <td width="25%"><?=date_fr2($list->Date_Exp)?></td>
             
                
                               
    
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

</body>
</html>