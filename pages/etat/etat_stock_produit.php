
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
                <td  style="width: 70%;font-size: 20px; font-weight: bold;padding-left: 100px" >Fiche de Mouvement
                </td>
            </tr>
    </table>

    <table   style="margin-bottom: 10px;margin-top: -0px" >
       
            <tr>
                
                
                 <td style="    width: 50%;font-size: 14px;" >
                    
                     <div style="border:0px;border-color: black;border-radius: 10px; padding: 20px;width:100%;background: #ccc;" >
                        
                         <span style=" color:black; font-weight:  bold;">ID:</span> <?=id('Prd/',$nom[0])?><br>
                         <span style=" color:black; font-weight:  bold;">Produit:</span> <?=strtoupper($nom[1])?>  <?=strtoupper($nom[2])?><br>
                         <span style=" color:black; font-weight:  bold;">Forme:</span> <?=strtoupper($nom[1])?>  <?=strtoupper($nom[5])?><br>
                         <span style=" color:black; font-weight:  bold;">Catégorie:</span> <?=strtoupper($nom[1])?>  <?=strtoupper($nom[5])?><br>
                         <span style=" color:black; font-weight:  bold;">Famille: </span><?=strtoupper($nom[1])?>  <?=strtoupper($nom[4])?><br>
                     </div>
                 </td>
                 <td style="text-align: center;    width: 10%"></td>
            
            </tr>
    </table>

   <table style="width: 100%; font-size: 12px;"  >
    <thead>
            <tr style="background: rgba(0,0,0,0.1);">
                <th colspan="3" style="font-size: 12px; text-align: center; border: 1px solid #ccc">Quantitée</th>
            </tr>
            <tr style="background: #ccc;">
                <th style="width: 24%;border: 1px solid #ccc"><i class="fa fa-arrow-down"></i> &nbsp;Stock d'Enterer</th>
                <th style="width: 24%;border: 1px solid #ccc"><i class="fa fa-arrow-up"></i> &nbsp;Sortie</th>
                <th style="width: 24%;border: 1px solid #ccc"><i class="fa fa-cubes"></i>&nbsp;Reste</th>
                <th style="width: 18%;border: 1px solid #ccc">Date de Péremption</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach( stock_produit_date($nom[0]) as $list) {
                $sortie=Quantité_tfr_produit($list->ID);?>
          <tr  style="background: rgba(255,255,255);">
                <td style="border: 1px solid #ccc"><?= $list->stk+$sortie;?></td>
                <td style="border: 1px solid #ccc" ><?php  echo $sortie ?></td>
                <td style="border: 1px solid #ccc"><?=$list->stk?></td>
                <td style="width: 18%;border: 1px solid #ccc"><span class="bg-info" style="background: red; padding:5px;border-radius:2px;color:black"><?= date_fr($list->Date_Exp)?></span></td>
              
            </tr>
            <?php } ?>
        </tbody>
       
    </table>


    
</page>