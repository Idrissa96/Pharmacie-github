<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	  <table  class="table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8em">
        <thead>
            <tr style="background: rgba(0,0,0,0.2);">
                <th>Odronnance</th>
                <th>Site de perscription</th>
                <th>Perscripteur</th>
                <th>Date de Per.</th>
                <th>Date de P. RDV</th>
                <th>Quantité P.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
require("../dBase/connection.php");
 require("fonctions/select_Insert.php"); 
            foreach( liste_sortie_patient($_POST['donne']) as $list) {?>
            <tr  style="background: rgba(255,255,255);">
                <td width="50%"><?= $list->Code_Arv?></td>
                <td width="25%"><?= strtoupper($list->Lib_Sit."/".$list->Reg_Sit)?></td>
                <td width="25%"><?= strtoupper($list->Nom_Pre_Per)?></td>
                <td width="25%"><?= strtoupper($list->Date_Per)?></td>
                <td width="25%"><?= strtoupper($list->Date_Rdv)?></td>
                <td width="25%"><?= strtoupper($list->nbr)?></td>
             
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