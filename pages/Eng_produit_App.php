
<html>
    <head></head>
    <body style="float: top">
     <progress id="progress" value="0" max="100" style="margin-bottom:30% ;width: 800px;margin-left: 20%;height: 20px; border-radius: 0px">
        </progress>
        <?php

if(isset($_POST['listEnter']) ){
  
  try {

    $bd->beginTransaction();
    $ID=Enregistre_app($_SESSION['ID'],$_POST['FourApp'],$_POST['Ref'],$_POST['dataapp'],$_POST['obr']);
    echo $ID;
    $liste=explode(",",$_POST['listEnter']);
    $tail=count($liste);
    $i=1;
        while(isset($liste[$i])){
            $var=str_replace('Prd','',$liste[$i]);
            Enregistre_stock($ID,$_POST['Prd'.$var],$_POST['QQ'.$var],$_POST['datxp'.$var],$_POST['OB'.$var]);

             echo "<script type=\"text/javascript\"> document.getElementById(\"progress\").value=".$i*100/$tail."</script>";
        $i++;
        }
    $bd->commit();
     echo "<script language='javascript'> window.location.href ='index.php?page=app&ok=1'</script>";
  } catch (Exception $e) {
      $bd->rollback();
      echo(":mnfmljkndfl=k");
  }


  
    
}
?>
    </body>
</html>