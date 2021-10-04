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
                <th>Quantité Servie</th>
                <th>Quantité Demandée</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
require("../dBase/connection.php");
 require("fonctions/select_Insert.php"); 
            foreach( Liste_prodduit_Tfr_Arv($_POST['donne']) as $list) {?>
            <tr  style="background: rgba(255,255,255);">
                <td ><?= $list->Lib_Art?></td>
                <td ><?= strtoupper($list->Quant)?></td>
                <td ><?= strtoupper($list->QD)?></td>
             
                <td style="text-align: center;color:black">
                    
                                <a class=" " href="#" style="height: 20px;margin-bottom: -2px" aria-haspopup="true" aria-expanded="true">/// </a>
                               
    
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

</body>
</html>