
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
    <table  >
       
            <tr>
                <td  ><img  src="../img/logo_pharmacie.png" alt=""  width=190  >
                </td>
            </tr>
            <tr>
                <td style="text-align: center" width="30" >CHU 
                    Pharmacie centrale
                    <br>Tel: +227 00 00 00 00 <br>
                    Email : chu@gmail.com
                </td>
            </tr>
    </table>

    <table   style="margin-bottom: 10px;margin-top: -150px" >
       
            <tr>
                
                <td style="width: 45%">
                    
                </td>
                 <td style="    width: 40%;font-size: 18px;" >
                    
                     <div style="border:0px;border-color: black;border-radius: 10px; padding: 20px;width:100%;background: #ccc;" >
                        
                         ID: <?=$nom[0]?><br>
                         Nom: <?=strtoupper($nom[1])?><br>
                         Prenom: <?=strtoupper($nom[2])?><br>
                         Age: <?=strtoupper($nom[3])?><br>
                         Taille: <?=$nom[7]?>m  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Poids: <?=$nom[6]?> Kg<br>
                         Tel: <?= formatfrench($nom[4],'+227')?><br>
                         Adrésse: <?=strtoupper($nom[5])?><br>
                     </div>
                 </td>
                 <td style="text-align: center;    width: 10%"></td>
            
            </tr>
    </table>

   <table style="width: 100%; font-size: 12px;"  >
        
            <tr style="border: 1px solid #ccc;">
                <th style="border: 1px solid #ccc;width:20%">Odronnance</th>
                <th style="border: 1px solid #ccc;width:20%">Site de perscription</th>
                <th style="border: 1px solid #ccc;width:20%">Perscripteur</th>
                <th style="border: 1px solid #ccc;width:15%;text-align: center;">Date de Per</th>
                <th style="border: 1px solid #ccc;width:16%;text-align: center;">Date de P. RDV</th>
            </tr>
            <tr style="border: 1px solid #ccc;">
                <td style="border: 1px solid #ccc;" >8282852</td>
                <td style="border: 1px solid #ccc;" > CHU/Niamey</td>
                <td style="border: 1px solid #ccc;" >DR Alassane </td>
                <td style="border: 1px solid #ccc;text-align: center;"> 5252525252</td>
                <td style="border: 1px solid #ccc;text-align: center;">825252</td>
            </tr>
    </table>

    <table cellspacing="0" borde="" style="font-size: 14px;margin-left: 100px">
        
            <tr style="background: #ccc">
                <td style="width: 30%">Produit</td>
                <td style="width: 20% ;text-align: center;">Quantité démandée</td>
                <td  style="width: 20%; text-align: center;">Quantité Servie</td>
            </tr>
        <?php
            foreach( Liste_article() as $list) {?>
            <tr >
                <td  style="border-bottom: 1px;"><?php echo  $list->Code_Art.' '.$list->Lib_Art.' '. $list->Lib_Dos ;?></td>
                 <td style="border-bottom: 1px;text-align: center;">5</td>
                  <td style="border-bottom: 1px;text-align: center;">5</td> 
            
            </tr>
            <?php } ?>
    </table>


    
</page>