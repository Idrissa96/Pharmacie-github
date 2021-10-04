
<html>
    <head></head>
    <body style="float: top">
     <progress id="progress" value="0" max="100" style="margin-bottom:30% ;width: 800px;margin-left: 20%;height: 20px; border-radius: 0px">
        </progress>
        <?php
        try{ 

               $bd->beginTransaction();

                if(isset($_POST['listEnter']) ){
                  
                  
                $ID=Enregistre_transfere_Arv($_POST['Code_Sit'],$_POST['Code_Beni'],$_SESSION['ID'],$_POST['dateT'],$_POST['dateP'],$_POST['RDV'],$_POST['Doc'],$_POST['obr']);
                 

                    $liste=explode(",",$_POST['listEnter']);
                    $tail=count($liste);
                    $i=1;
                        while(isset($liste[$i])){
                            $var=str_replace('Prd','',$liste[$i]);
                            $final=0;
                            $rest=$_POST['QS'.$var];
                              foreach(stock_produit_date($_POST['Prd'.$var]) as $list){
                                      if($list->stk>=$rest){
                                        Modifie_stock_produit($list->ID,number_format($list->stk-$rest));
                                        Enregistre_prduit_transfere_arv($list->ID,$ID,$rest,$_POST['QD'.$var]);
                                        //die(0);
                                        goto someLine;
                                      }else{
                                        $rest=$rest-$list->stk;
                                        Modifie_stock_produit($list->ID,0);
                                         Enregistre_prduit_transfere_arv($list->ID,$ID,$list->stk,0);
                                      }
                                } 
                              someLine: 
                             echo "<script type=\"text/javascript\"> document.getElementById(\"progress\").value=".($i+1)*100/$tail."</script>";
                        $i++;
                        }
               // die($ID);
               $bd->commit();
                 echo "<script language='javascript'> window.location.href ='index.php?page=SortieARV&ok=1'</script>";

    
}
            }catch (Exception $e) {
      $bd->rollback();
      echo("echec operation");
  }

 



?>
    </body>
</html>