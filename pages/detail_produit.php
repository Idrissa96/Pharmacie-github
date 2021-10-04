<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	  <table  class="table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8em">
        <thead>
            <tr style="background: rgba(0,0,0,0.09);">
                <th colspan="3" style="font-size: 12px; text-align: center;">Quantitée</th>
            </tr>
            <tr style="background: rgba(0,0,0,0.09);">
                <th style="width: 24%"><i class="fa fa-arrow-down"></i> &nbsp;Stock d'Enterer</th>
                <th style="width: 24%"><i class="fa fa-arrow-up"></i> &nbsp;Sortie</th>
                <th style="width: 24%"><i class="fa fa-cubes"></i>&nbsp;Reste</th>
                <th style="width: 20%">Date de Péremption</th>
                <th style="width: 20%">Détail</th>
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
            $donne=explode('/',$_POST['donne']);
            foreach( stock_produit_date($donne[0]) as $list) {
                $sortie=Quantité_tfr_produit($list->ID);?>
          <tr  style="background: rgba(255,255,255);">
                <td ><?= $list->stk+$sortie;?></td>
                <td ><?php  echo $sortie ?></td>
                <td ><?=$list->stk?></td>
                <td ><span class="bg-info" style="padding:5px;border-radius:2px;color:white"><?= date_fr2($list->Date_Exp)?></span></td>
                <td ><span><a  class="bg-success" style="padding:5px;border-radius:2px;color:white" href="pages/impression.php?lot=<?php echo $list->ID;?>&d=<?php echo date_fr2($list->Date_Exp);?>&stk=<?php echo $list->stk+$sortie;?>&code=<?=$donne[0]?>&nom=<?=$donne[1]?>" target="_blank"> <i class="fa fa-list"></i> </a></span></td>
              
            </tr>
            </a> 
            <?php } ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

</body>
</html>