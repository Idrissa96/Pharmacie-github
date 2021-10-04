<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
       
/* Add Animation */
@keyframes animatedown {
  from {top: -500px; opacity: 0.3}
  to {top: 1; opacity: 0}
}
    </style>

	<script type="text/javascript">
        </script>
        
</head>
<body >
<?php
require("../dBase/connection.php");
require("fonctions/select_Insert.php"); 
function Id2($d,$donne){
    if(  strlen($donne)==1)
        return $d."000".$donne;
    elseif (strlen($donne)==2) {
        return $d."00".$donne;
    }elseif (strlen($donne)==3) {
        return $d."0".$donne;
    }else{
        return $d.$donne;
    }
}
    $donne= explode('/', $_POST['donne']);
    ?>
<!-- Nouveau user Logout Modal-->

                <div class="modal-body" id="div1" style="background: white!important">
                   <form id="AppForm">
                    <div class="row" >
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                                        <label>Numéro</label>
                                                         <input type="text"  class="form-control "  placeholder="" required="" value="<?= Id2('App',$donne[0])?>"  disabled="">
                                                        <input type="text"  class="form-control " id="AppID" placeholder="" required="" value="<?= $donne[0]?>"  disabled="" style="display: none">
                                                         </div>
                                                    </div>
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label>Réfference<span class="text-danger">*<span></label>
                                        <input type="text" id="Ref"  class="form-control "  value="<?= $donne[1]?>"  onchange="allumeModifi()">
                                 </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Fournisseur<span class="text-danger">*<span></label>
                         <select  required="" id="founi" class="form-control"  onchange="allumeModifi()">
                            <option value="<?=$donne[4]?>"><?= $donne[2]?></option>
                            <?php 
                                  
                                 foreach( Liste_Four()  as $four) {?>
                                    <option value="<?=$four->Code_Four?>"><?= strtoupper($four->Lib_Four)?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date d'entrer <span class="text-danger">*<span></label>
                                    <input type="date" id="dAte" class="form-control " onkeypress="chiffres(event)" required=""  value="<?= $donne[3]?>" onchange="allumeModifi()">
                                 </div>
                            </div>
                            
                             <div class="col-md-7">
                                <div class="form-group">
                                    <label>Observation</label>
                                   <input type="textarea" class="form-control " id="oBR" value="<?=$donne[5]?>" onchange="allumeModifi()"></input type="" name="">
                                 </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                               <a  class="btn btn-info" href="#" id="allumeModifi" onclick="Modification_app()" style="width: 100%;display: none"> valider </a> 
                            </div>
                        </form>
                    </div>  
                    

                </div>
                <div class="modal-body" id="div2" style="display: none">
                    <div class="row" >


<div class="col-md-5" >
	
            <div class="form-group">
            <label>Produit<span class="text-danger">*</span></label>
            <select   id="Ajout_P_O" class="form-control" >
            <option value="" ></option>
            <?php foreach(Liste_article() as $Art) {
                ?>
            <option value="<?=$Art->Code_Art?>" ><?= strtoupper($Art->Lib_Art." ".$Art->Lib_Dos)?></option>
            <?php } ?>
            </select>
            </div>

            </div>
            <div class="col-md-2">
            <div class="form-group">
            <label>Quantité<span class="text-danger">*</span></label>
            <input type="number" id="QQ" class="form-control "  >
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <label>Date Exp.<span class="text-danger">*</span></label>
            <input type="date" id="datxp" class="form-control " onkeypress="chiffres(event)" >
            </div>
            </div>

            <div class="col-md-2">
            <div class="form-group">
            <br>
            <input type="button"  class=" btn btn-primary Ajuster" value="+">
            </div>
            </div>
            <div class="col-lg-12">
            <table class="ListeProduit table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8rem">
            <tr>
            <th>#</th>
            <th>Produits</th>
            <th width="50px">Qantitée en stock</th>
            <th width="50px">Qantitée Sortie</th>
            <th>Date de Péremption</th>
            <th></th>
            </tr>
<tbody>
        <?php 
 function date_fr2($d1){
    ///date en format jj/M/A
    return(implode('/', array_reverse(explode('-',$d1))));
 }
            foreach( Liste_prodduit_App($donne[0]) as $list) {
                $Quantité_tfr_produit=Quantité_tfr_produit($list->ID);?>
           
            <tr  style="background: rgba(255,255,255);">
                <td width="10%"> 
                    <?php if ($Quantité_tfr_produit==0) {
                       echo "<input  style='min-width: 2px;border:0px' type='checkbox' name='select' value='".$list->ID."'>";
                    }?>
                </td>
                <td width="50%"><?= $list->Lib_Art?></td>
                <td width="25%"><input  style='min-width: 2px;border:0px' type="number" name="Quantite" id="<?=$list->ID?>YQ" onchange="allumeligne(id)" value="<?= $list->Quant?>" onkeypress="chiffres(event)"></td>
                <td width="25%"><input  style='min-width: 2px;border:0px' type="text" id="<?=$list->ID?>YS" onchange="allumeligne(id)" value="<?=$Quantité_tfr_produit?>" disabled=""></td>
                <td width="25%"><input  style='min-width: 2px;border:0px' type="date" name="date" value="<?= $list->Date_Exp?>" id="<?=$list->ID?>YD" onchange="allumeligne(id)"></td>
                <td width="25%"> <button value="" id="<?=$list->ID?>YV" onclick="Valider_modifi(id)" style="display: none;">Valider</button></td>
            
                </td>
            </tr>
           
            <?php } ?>
        </tbody>

</table>
<button type="button"  class="supp btn bg-danger" style="color: white"><i class="fa fa-trash"></i></button>
</div>
</div>
                </div>
                <div class="modal-footer" style=" background: white">
                    <div id="pageSai" style="position: absolute;left: 5% !important">
                         <h6 class="bg-darkh" style="padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important">Page: 1/2</h6>
                    </div>
                    <a id="etatSuivante" href="#"  class="btn btn-info" onclick="suiv_pre()"  style="color: white" >Suivant&nbsp;<i class="fa fa-arrow-right"></i></a>
                    
        
                  
                    <a class="btn btn-danger" href="" onclick="return(confirm('Voullez vous quitter cette page?'));">Fermer</a>
                    
                </div>
      





                            <div class="card border-left-success shadow h-200 py-1 animatedown" id="alertModif" style="display: none;position:fixed; right:0%; top:20px; min-height: 20px;background: rgba(255,255,255,0.5);">
                                <div class="card-body" style="">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1" >
                                               <i class="fa fa-check fa-1x"></i>&nbsp; Operation effectuée avec succès
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">


    var div1= document.getElementById("div1");
     var div2 =document.getElementById("div2");

    

     function allumeligne(id){
       // alert(id);
        var l=id.split('Y');
        var lig= document.getElementById(l[0]+'YV');
        lig.style.display='inline';

     }

     function allumeModifi(){
       // alert(id);
        var lig= document.getElementById('allumeModifi');
        lig.style.display='inline';

     }
  
  


     function suiv_pre(){
       
      
      if(document.getElementById("etatSuivante").innerHTML=="Suivant&nbsp;<i class=\"fa fa-arrow-right\"></i>"){
        document.getElementById("etatSuivante").innerHTML="<i class=\"fa fa-arrow-left\"></i>&nbsp;Précedent";
        document.getElementById("pageSai").innerHTML="<h6 style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 2/2</h6>";
        div1.style.display='none';
        div2.style.display='block';
         	
      }else{
         document.getElementById("etatSuivante").innerHTML="Suivant&nbsp;<i class=\"fa fa-arrow-right\"></i>";
        div1.style.display='block';
        div2.style.display='none';
        document.getElementById("pageSai").innerHTML="<h6  style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 1/2</h6>";

         	document.getElementById('EnregARVPRODUIT').style.display='none';

      }
      
     }

      function Modification_app(){

            //alert($('#founi').val());

            ///  var data =document.getElementById('AppForm').serialize();
              if($.trim($('#Ref').val())== '')
              {
                $('#Ref').focus();
                console.log("entere");
              }else{

                var tb ="&ID="+$('#AppID').val()+"&ref="+$('#Ref').val()+"&four="+$('#founi').val()+"&obr="+$('#oBR').val()+"&date="+$('#dAte').val();
                $.ajax({
                        type:'POST',
                        data:tb,
                        url:'pages/modification/modififi_App.php',
                        success:function(data) {
                        document.getElementById('alertModif').style.display='inline';
                        setTimeout(function() { $("#alertModif").fadeOut().empty();}, 3000);
                            //document.getElementById(this).style.display='none';
                        }});               

              }
                
    
              /*  ;
                $.ajax({
            type:'POST',
            data:tb,
            url:'pages/modififi_stock.php',
            success:function(data) {
            document.getElementById('alertModif').style.display='inline';
            setTimeout(function() { $("#alertModif").fadeOut().empty();}, 3000);
                document.getElementById(id).style.display='none';}});*/

    }

      function Valider_modifi(id){

              var l=id.split('Y');
              var D=l[0];
               // var tb =$("didi").serializeArray();
                var tb ="&ID="+D+"&Quant="+$("#"+D+"YQ").val()+"&date="+$("#"+D+"YD").val();
                $.ajax({
            type:'POST',
            data:tb,
            url:'pages/modififi_stock.php',
            success:function(data) {
            document.getElementById('alertModif').style.display='inline';
            setTimeout(function() { $("#alertModif").fadeOut().empty();}, 3000);
                document.getElementById(id).style.display='none';}});

    }

/// fonction pour ajuste un appro deja valider

      $(".Ajuster").click(function() {

            var nom = $("#Ajout_P_O").val();
            var QQ = $("#QQ").val();
            var EXp = $("#datxp").val();
           var AppT = $("#AppID").val();
            var ind=1;
            if(QQ !=0 && EXp !='' && nom!=0){

             var tb ="&AppID="+AppT+"&ID="+nom+"&Quant="+QQ+"&date="+EXp;
                $.ajax({
                        type:'POST',
                        data:tb,
                        url:'pages/enreg_stock.php',
                        success:function(data) {
                        document.getElementById('alertModif').style.display='inline';
                        setTimeout(function() { $("#alertModif").fadeOut().empty();}, 3000);}});

                          var detaille=$("#Ajout_P_O option:selected").text();
                          var ligne="<tr style=\"background: white;\"><td><input type='checkbox' name='select' Value=',Prd"+ind+"' style='min-width: 2px;border:0px'></td><td>"+detaille+"<td><input style='min-width: 2px;border:0px' type='text' name='QQ"+ind+"'value='"+QQ+"'></td></td><td><input  style='min-width: 2px;border:0px' type='text' value='0'></td><td><input style='min-width: 2px;border:0px' type='date' name='datxp"+ind+"'value='"+EXp+"'></td><tr>";
                       
                        $("table.ListeProduit").append(ligne);
                        $("#Ajout_P_O").empty();
                        $("#QQ").empty();
                        
                        $("#datxp").val('');
      
        }else{
            alert('Veillez remplire touts les champs obligatoire!');
          }
    });

      $(".supp").click(function() {
        $("table.ListeProduit").find('input[name="select"]').each(function() {
            if ($(this).is(":checked")) {
                var tb ="&ID="+$(this).val();
                $.ajax({
                        type:'POST',
                        data:tb,
                        url:'pages/modification/sup_App.php',
                        success:function(data) {
                        document.getElementById('alertModif').style.display='inline';
                        setTimeout(function() { $("#alertModif").fadeOut().empty();}, 3000);
                            //document.getElementById(this).style.display='none';
                        }}); 
                alert($("#"+idSup).val());


                //$(this).parents("table.ListeProduit tr").remove();
            }
        });
    });

</script>

</body>
</html>