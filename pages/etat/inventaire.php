
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
                <td  style="width: 50%;font-size: 20px; font-weight: bold;padding-left: 150px" ><BR><BR>Fiche d' inventaire
                </td>
                <td style="width: 25%; text-align: center"  >Republique du Niger <br> FRATERNITE TRAVAIL PROGRES <br> HOPITAL NATIONAL DE L4AMORDE
                </td>
            </tr>
    </table>

    <table style="width: 100%; font-size: 12px;"  >
    <thead>
            <tr>
                <th style=" border: 1px solid #ccc;width:8%">Code</th>
                <th style=" border: 1px solid #ccc;width:12%">Désignaton</th>
                <th style=" border: 1px solid #ccc;width:8%">Dosage</th>
                <th style=" border: 1px solid #ccc;width:11%">Condit. </th>
                <th style=" border: 1px solid #ccc;width:8%">Famille</th>
                <th style=" border: 1px solid #ccc;width:12%">Categorie</th>
                <th style=" border: 1px solid #ccc;width:10%">Stock théorique</th>
                <th style=" border: 1px solid #ccc;width:10%">Stock réel</th>
            </tr>
        </thead>
        <tbody>
            <tr > <td colspan="7" style=" text-align: center;"> Stock périmé</td></tr>
        <?php
            foreach( Liste_stoct_courant() as $list){?>
            <tr >
                <td style=" border: 1px solid #ccc"><?= Id("Prd/",$list->Code_Art) ?></td>
                <td style=" border: 1px solid #ccc"><?= strtoupper(  $list->Lib_Art)?></td>
                <td style=" border: 1px solid #ccc"><?= strtoupper(  $list->Lib_Dos)?></td>
                <td style=" border: 1px solid #ccc"><?= strtoupper(  $list->Lib_For)?></td>
                <td style=" border: 1px solid #ccc"><?= strtoupper(  $list->Lib_Fam)?></td>
                <td style=" border: 1px solid #ccc"><?= strtoupper(  $list->Lib_Cat)?></td>
                <td style=" border: 1px solid #ccc;text-align:center"><?= strtoupper($list->nbr)?>
                </td>
                <td style=" border: 1px solid #ccc;width:10%">&nbsp;</td>
            </tr>
            <?php } ?>
            <tr > <td colspan="7" style=" text-align: center;"> Stock non périmé</td></tr>

            <?php
            foreach( Liste_stoct_perime()as $list){?>
            <tr >
                <td style=" border: 1px solid #fff;background: #ccc"><?= Id("Prd/",$list->Code_Art) ?></td>
                <td style=" border: 1px solid #fff;background: #ccc"><?= strtoupper(  $list->Lib_Art)?></td>
                <td style=" border: 1px solid #fff;background: #ccc"><?= strtoupper(  $list->Lib_Dos)?></td>
                <td style=" border: 1px solid #fff;background: #ccc"><?= strtoupper(  $list->Lib_For)?></td>
                <td style=" border: 1px solid #fff;background: #ccc"><?= strtoupper(  $list->Lib_Fam)?></td>
                <td style=" border: 1px solid #fff;background: #ccc"><?= strtoupper(  $list->Lib_Cat)?></td>
                <td style=" border: 1px solid #fff;background: #ccc;text-align:center"> <?= strtoupper($list->nbr)?></td>
                <td style=" border: 1px solid #fff;background: #ccc;width:10%">&nbsp;</td>
            </tr>
            <?php } ?>
        </tbody>
       
    </table>


    
</page>