<page >
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">html2pdf</td>
                <td style="text-align: center;    width: 34%">Test d'header</td>
                <td style="text-align: right;    width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%">html2pdf.fr</td>
                <td style="text-align: right;    width: 50%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <span style="font-size: 20px; font-weight: bold"></span><br>
   <table id="Id01"  border="1" width="100%" style="font-size: 20px">
        <thead>
            <tr>
                <th>Code</th>
                <th>Désignaton</th>
                <th>Dosage</th>
                <th>Condit. </th>
                <th>Famille</th>
                <th>Categorie</th>
                <th>Min.</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_article() as $list) {?>
            <tr>
                <td><?php echo  $list->Code_Art  ;?></td>
                 <td><?php echo  $list->Lib_Art  ;?></td>
                  <td><?php echo  $list->Lib_Dos  ;?></td>
                   <td><?php echo  $list->Lib_Cat  ;?></td>
                    <td><?php echo  $list->Lib_For  ;?></td>
                     <td><?php echo  $list->Lib_Fam  ;?></td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>

    Ca marche toujours !<br>
    De plus, vous pouvez faire des sauts de page manuellement en utilisant les balises &lt;page&gt; &lt;/page&gt;, comme ici par exemple :
</page>
<page pageset="old">
    Nouvelle page !!!!
</page>