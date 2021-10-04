
<style type="text/css">
      table {
    margin: 18px 0;
    width: 100%;
    border-collapse: collapse;

}
table th,
table td {
    text-align: left;
    padding: 6px;
    background: transparent;
}
table,
th,
td {
    border: 1px solid transparent;
}
</style>
<page backtop="20mm" backbottom="5mm" backleft="10mm" backright="10mm" style="width: 100%" >
    <page_header>
        <table style="width: 100%; border: solid 0px black;">
            <tr>
                <td style="text-align: left;    width: 33%"></td>
                <td style="text-align: center;    width: 34%"></td>
                <td style="text-align: right;    width: 33%"></td>
            </tr>
        </table>
    </page_header>
    <page_footer >
        <table style="width: 100%; border: solid 0px black; margin-bottom: 20px">
            <tr>
                <td style="text-align: left;    width: 20%;padding-left: 20px"><qrcode value="idrissa" style="width: 15mm; background-color: #CCFFFF; color: #003333"></qrcode></td>
                <td style="text-align: center;    width: 40%">  </td>
                <td style="text-align: right;    width: 40%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <table style="width: 100%;margin-top: -50px"  >
       
            <tr>
                <td style="width: 20%; text-align: center"  ><img  src="../img/logo_pharmacie.png" alt=""  width="90" height="70" ><br> <?=$Logi?>
                </td>
                <td  style="width: 70%;font-size: 20px; font-weight: bold;padding-left: 100px" >
                </td>
            </tr>
    </table>

    <table   style="margin-bottom: 10px;margin-top: -0px" >
       
            <tr>
                
                
                 <td style="    width: 50%;font-size: 14px;" >
                    
                     <div style="border:0px;border-color: black;border-radius: 10px; padding: 20px;width:100%;background: #ccc;" >
                        
                         <span style=" color:black; font-weight:  bold;">ID:</span> <?=id('App/',$val[0])?><br><br>
                         <span style=" color:black; font-weight:  bold;">Reférence:</span> <?=strtoupper($val[1])?>  <br><br>
                         <span style=" color:black; font-weight:  bold;">Fournisseur:</span> <?=strtoupper($val[2])?>  <br><br>
                         <span style=" color:black; font-weight:  bold;">Date d'Entrer:</span> <?=strtoupper($val[3])?> 
                     </div>
                 </td>
                 <td style="text-align: center;    width: 10%"></td>
            
            </tr>
    </table>

   <table style="width: 100%; font-size: 12px;padding-left: 50px"  >
     <thead>
            <tr style="background: rgba(0,0,0,0.2);">
                <th style="width: 40%;border: 1px solid #ccc">Produit</th>
                <th  style="width: 20%;border: 1px solid #ccc">Quantité Réçu</th>
                <th  style="width: 20%;border: 1px solid #ccc">Date de Péremption</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach( Liste_prodduit_App($val[0]) as $list) {?>
            <tr  style="background: rgba(255,255,255);">
                <td width="50%" style="border: 1px solid #ccc"><?= $list->Lib_Art?></td>
                <td width="25%" style="border: 1px solid #ccc"><?= $list->Quant+Quantité_tfr_produit($list->ID)?></td>
                <td width="25%" style="border: 1px solid #ccc"><?=date_fr($list->Date_Exp)?></td>
            </tr>
            <?php } ?>
        </tbody>
       
    </table>


    
</page>