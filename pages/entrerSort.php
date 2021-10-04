<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .okdidi {
  color:black;
   display: inline; 
   
   padding-left: 20%; 
   padding-right: 15%; 
   padding-top: 2%;
  animation-name: animatetop;
  animation-duration: 0.8s
}

/* Add Animation */
@keyframes animatetop {
  from {top: -500px; opacity: 0.3}
  to {top: -10; opacity: 1}
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
                    <h5 class="modal-title" id="exampleModalLabel">Fiche de Sortie</h5> 
                    <a class="close"  href="index.php?page=SortieApp&dateD=<?php echo dateAvant(date('Y-m-d'),5);?>&dateF=<?php echo date('Y-m-d');?>" aria-label="Close" onclick="return(confirm('Voullez vous quitter cette page?'));">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <form method="POST" action="index.php?page=Eng_produit_Ser">
               
                <div class="modal-body" >
                    <div class="row" >
<div class="col-md-5">
<div class="form-group">
  <?php 
 $text=explode(',',$_POST['ServiceD']); ?>
<label>Service<span class="text-success"></span></label>
<input type="text"  name="CodeSer" class="form-control " style="display: none;" value="<?php echo $text[0];?>" >
<input type="text"  class="form-control " onkeypress="chiffres(event)" disabled="" value="<?php echo $text[1];?>" >
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Date de la Sortie<span class="text-danger">*</span></label>
<input type="date"  class="form-control " name="dateS"onkeypress="chiffres(event)" value="<?php echo date('Y-m-d');?>" required="" >
</div>
</div>
<div class="col-md-5" >

<div class="form-group">
<label>Produit<span class="text-danger">*</span></label>
<select data-style="form-control selecte"  id="Produit" class="selectpicker show-tick form-control" data-live-search="true" >
<option value="" ></option>
<?php foreach(Liste_article() as $Art) {
    ?>
<option value="<?=$Art->Code_Art?>" ><?= strtoupper($Art->Lib_Art." ".$Art->Lib_Dos)?></option>
<?php } ?>
</select>
</div>

</div>
<div class="col-md-2" id="la">

</div>
<div class="col-md-2">
<div class="form-group">
<label>Qté Demandée<span class="text-danger">*</span></label>
<input type="text" id="QD" class="form-control " onkeypress="chiffres(event)" onkeyup="cpy()" >
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<label>Qté Servie<span class="text-danger">*</span></label>
<input type="text" id="QS" class="form-control " onkeypress="chiffres(event)" >
</div>
</div>

<div class="col-md-1">
<div class="form-group">
<br>
<input type="button"  class=" btn btn-primary add" value="+">
</div>
</div>
<div class="col-lg-12">
<table class="ListeProduit table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8rem">
<tr>
<th width="20px">#</th>
<th>Code</th>
<th width="40%">Produits</th>
<th width="25%">Qantité Démandée</th>
<th width="25%">Qantité Servie</th>
</table>
<button type="button"  class="delete btn bg-danger" style="color: white"><i class="fa fa-trash"></i></button>
<input type="text" id="listEnter" name="listEnter" class="form-control" style="display: none;"  >
</div>
</div>
                </div>
                <div class="modal-footer" style=" background: white">
                    
                    
                        <button id="EnregARVPRODUIT" style="display: none" type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                  
                    <a class="btn btn-danger" href="index.php?page=app&dateD=<?php echo dateAvant(date('Y-m-d'),5);?>&dateF=<?php echo date('Y-m-d');?>" onclick="return(confirm('Voullez vous quitter cette page?'));">Annuler</a>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
    var QD= document.getElementById("QD");
     var QS =document.getElementById("QS");
  


     function cpy(){
        QS.value=QD.value;
             }

</script>

</body>
</html>