<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.okdidi {
  color:black;
   display: inline; 
   
   padding-left: 22%; 
   padding-right: 19%; 
   padding-top: 5%;
  animation-name: animatetop;
  animation-duration: 0.8s
}

/* Add Animation */
@keyframes animatetop {
  from {top: -500px; opacity: 0.3}
  to {top: 0; opacity: 1}
}
	</style>
	<script type="text/javascript">

            var ind=0;
            var VariableEntrer=''
        </script>
        
</head>
<body >
<!-- Nouveau user Logout Modal-->
<div class="fade-in-down " style="background: rgba(0,0,0,0.5);">
        <div class="modal okdidi" style="background: rgba(0,0,0,0.5);">
            <div class=" fade-in-down border-left-success"  style="background: white!important">
                <div class="modal-header" style=" background: white"  data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right" >
                    <h5 class="modal-title" id="exampleModalLabel">Fiche d'entrer</h5> 
                    <a class="close"  href="index.php?page=app" aria-label="Close" onclick="return(confirm('Voullez vous quitter cette page?'));">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <form method="POST" action="index.php?page=Eng_produit_App">
                <div class="modal-body" id="div1" style="background: white!important">
                    <div class="row" >
                        <div class="col-md-3">
                            <div class="form-group">
                                                        <label>Numéro</label>
                                                        <input type="text"  class="form-control " placeholder="" required="" value="App/" disabled="">
                                                         </div>
                                                    </div>
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label>Réfference<span class="text-danger">*<span></label>
                                        <input type="text" name="Ref" id="Ref"  class="form-control "  >
                                 </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Fournisseur<span class="text-danger">*<span></label>
                         <select data-style="form-control selecte" required="" name="FourApp" id="FourApp" class="selectpicker show-tick form-control" data-live-search="true" >
                            <option value=""></option>
                            <?php foreach( Liste_Four()  as $four) {?>
                                    <option value="<?=$four->Code_Four?>"><?= strtoupper($four->Lib_Four)?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Date d'entrer <span class="text-danger">*<span></label>
                                    <input type="date" name="dataapp" id="dataapp" class="form-control " onkeypress="chiffres(event)" required=""  value="<?=date('Y-m-d')?>">
                                 </div>
                            </div>
                            
                             <div class="col-md-7">
                                <div class="form-group">
                                    <label>Observation</label>
                                   <textarea class="form-control " name="obr"></textarea>
                                 </div>
                            </div>
                    </div>  
                    

                </div>
                <div class="modal-body" id="div2" style="display: none">
                    <div class="row" >


<div class="col-md-4" >
	<?php 
 $text=$_POST['CatApp'];
 $i=1;
 $req="Code_Cat=".$text[0];
 while(isset($text[$i]))
 {
 	if($text[$i]!=',')
 	$req= $req." or Code_Cat=".$text[$i];
 	$i++;
} ?>
<div class="form-group">
<label>Produit<span class="text-danger">*</span></label>
<select data-style="form-control selecte"  id="prdtApp" class="selectpicker show-tick form-control" data-live-search="true" >
<option value="" ></option>
<?php foreach(Liste_article_requette_cat($req) as $Art) {
    ?>
<option value="<?=$Art->code?>" ><?= strtoupper($Art->Lib_Art." ".$Art->Lib_Dos)?></option>
<?php } ?>
</select>
</div>

</div>
<div class="col-md-3">
<div class="form-group">
<label>Quantité<span class="text-danger">*</span></label>
<input type="number" id="QQ" class="form-control " onkeypress="chiffres(event)" >
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Date Exp.<span class="text-danger">*</span></label>
<input type="date" id="datxp" class="form-control " onkeypress="chiffres(event)" >
<input type="text" id="OB" class="form-control " value="R.A.S"  style="display: none;">
</div>
</div>

<div class="col-md-1">
<div class="form-group">
<br>
<input type="button"  class=" btn btn-primary add2" value="+">
</div>
</div>
<div class="col-lg-12">
<table class="ListeProduit table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8rem">
<tr>
<th width="20px">#</th>
<th>Code</th>
<th>Produits</th>
<th width="50px">Qantité</th>
<th style="text-align: center">Date d'expiration</th>

</table>
<button type="button"  class="delete btn bg-danger" style="color: white"><i class="fa fa-trash"></i></button>
<input type="text" id="listEnter" name="listEnter" class="form-control" style="display: none;"  >
</div>
</div>
                </div>
                <div class="modal-footer" style=" background: white">
                    <div id="pageSai" style="position: absolute;left: 25% !important">
                         <h6 class="bg-darkh" style="padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important">Page: 1/2</h6>
                    </div>
                    <a id="etatSuivante" href="#" class="btn btn-info" onclick="suiv_pre()"  style="color: white" >Suivant&nbsp;<i class="fa fa-arrow-right"></i></a>
                    
                        <button id="EnregARVPRODUIT" style="display: none" type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                  
                    <a class="btn btn-danger" href="index.php?page=app&dateD=<?php echo dateAvant(date('Y-m-d'),5);?>&dateF=<?php echo date('Y-m-d');?>" onclick="return(confirm('Voullez vous quitter cette page?'));">Annuler</a>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
<div class="row" >
 <!-- Earnings (Monthly) Card Example -->
 <div class="col-md-8 "></div>
 <div class="col-md-3">
     <?php 
       require("./pages/alert.php");
      ?>
        
    </div>
</div>

<script type="text/javascript">
    var div1= document.getElementById("div1");
     var div2 =document.getElementById("div2");
  


     function suiv_pre(){
       
      
      if(document.getElementById("etatSuivante").innerHTML=="Suivant&nbsp;<i class=\"fa fa-arrow-right\"></i>"){

        var Vide=1;
        if($.trim($('#Ref').val())== '')
          {
            $('#Ref').focus();
            Vide=0;
          }
          if($.trim($('#FourApp').val())== '')
          {
            $('#FourApp').focus();
            Vide=0;
          }
          if($.trim($('#dataapp').val())== '')
          {
            $('#dataapp').focus();
            Vide=0;
          }

        if (Vide==1)
        {


        document.getElementById("etatSuivante").innerHTML="<i class=\"fa fa-arrow-left\"></i>&nbsp;Précedent";
        document.getElementById("pageSai").innerHTML="<h6 style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 2/2</h6>";
        div1.style.display='none';
        div2.style.display='block';


      if (VariableEntrer!='')
         	document.getElementById("EnregARVPRODUIT").style.display='inline';
          }else{
            alert('Merci de bien remplire les champs obligatoire!')
          }
         	
      }else{
         document.getElementById("etatSuivante").innerHTML="Suivant&nbsp;<i class=\"fa fa-arrow-right\"></i>";
        div1.style.display='block';
        div2.style.display='none';
        document.getElementById("pageSai").innerHTML="<h6  style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 1/2</h6>";

         	document.getElementById('EnregARVPRODUIT').style.display='none';

      }
      
     }

</script>

</body>
</html>