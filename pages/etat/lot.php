
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
                <td style="text-align: center" width="30" >
                    <?=$Logi?>
                </td>
            </tr>
    </table>

    <table   style="margin-bottom: 10px;margin-top: -150px" >
       
            <tr>
                
                <td style="width: 40%">
                    
                </td>
                 <td style="    width: 50%;font-size: 14px;" >
                    
                     <div style="border:0px;border-color: black;border-radius: 10px; padding: 20px;width:100%;background: #ccc;" >
                        
                         <span style=" color:black; font-weight:  bold;">Produit:&nbsp;</span><?=Id('Prd/',$_GET['code'])." | ".$_GET['nom'] ?><br><br>
                         <span style=" color:black; font-weight:  bold;">Numéro:&nbsp;</span><?=Id('Stk',$_GET['lot']) ?><br><br>
                         <span style=" color:black; font-weight:  bold;">Stock d'entré: &nbsp;</span><?=$_GET['stk']?><br><br>
                         <span style=" color:black; font-weight:  bold;">Date de Péremption: &nbsp;</span><?=$_GET['d']?><br>
                     </div>
                 </td>
                 <td style="text-align: center;    width: 10%"></td>
            
            </tr>
    </table>


    <table style="width: 100%; font-size: 12px;"  >
    <thead>
            <tr style="background: #ccc;">
                <th style="width: 30%;border: 1px solid #ccc"><i class="fa fa-arrow-down"></i> &nbsp;Service</th>
                <th style="width: 20%;border: 1px solid #ccc"><i class="fa fa-arrow-up"></i> &nbsp;Quantité S.</th>
                <th style="width: 20%;border: 1px solid #ccc"><i class="fa fa-cubes"></i>&nbsp;Stock Restant</th>
                <th style="width: 18%;border: 1px solid #ccc">Date de Sortie</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $rest=$_GET['stk'];
            foreach( sotck_detail_service($_GET['lot']) as $list) {
                $rest-=$list->Quant_Tfr;?>
          <tr  style="background: rgba(255,255,255);">
                <td style="border: 1px solid #ccc"><?= $list->Lib_Ser;?></td>
                <td style="border: 1px solid #ccc" ><?=$list->Quant_Tfr?></td>
                <td style="border: 1px solid #ccc"><?=$rest?></td>
                <td style="width: 18%;border: 1px solid #ccc"><span class="bg-info" style="background: red; padding:5px;border-radius:2px;color:black"><?= date_fr($list->Date_Tfr)?></span></td>
              
            </tr>
            <?php } ?>
        </tbody>
       
    </table>

    
</page>