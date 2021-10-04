<html>
    <head>
       <script type="text/javascript">

            var ind=0;
            var VariableEntrer=''
        </script>
    </head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" float:top">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Sortie AVR &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#AjoutersORTIARV"  style="border-color:white"><i class="fa fa-file"></i>&nbsp;&nbsp;Ajouter</a>
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#SortiARV"><i class="fa fa-eye"></i>&nbsp;&nbsp;Autre Liste</a>
            </div>
        </h2>
    </div>
    
</div>


<div class="row" style="margin-top: -10px;">


    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4 border-left-success">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black">Liste des Sortie AVR Les Sortie du <?php  if(isset($_POST['dateD']))
        {
            echo date_fr($DD=$_POST['dateD'])."  au  ".date_fr($DF=$_POST['dateF']);
        }else{
            echo date_fr(dateAvant(date('Y-m-d'),5))."  au  ".date_fr(date('Y-m-d'));

        } ?> </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>#Num</th>
                <th>DATE PRESCRIP.</th>
                <th>DATE P. RDV</th>
                <th>BENEFICIARE</th>
                <th>PERSCRIPTEUR</th>
                 <th>SITE DE PRESCRIP.</th>
                

                <th>Nbr Produit</th>
                
                <th style="width:10px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_POST['dateD']))
        {
            $DD=$_POST['dateD'];
            $DF=$_POST['dateF'];
        }else{
            $DD=dateAvant(date('Y-m-d'),5);
            $DF=date('Y-m-d');

        }
            foreach( Liste_transfere_arv( $DD, $DF) as $list) {
                 $Var= $list->Code_Arv."/".$list->Date_Per ."/".$list->Date_Rdv."/".$list->Date_Per.'/'.$list->Nom_Beni." ".$list->Prenom_Beni.'/'.$list->Nom_Pre_Per.'/'.$list->Lib_Sit;?>
            <tr >
                <td><?= Id('ARV',$list->Code_Arv)?></td>
                <td><?= date_fr($list->Date_Per )?></td>
                 <td><?= date_fr($list->Date_Rdv)?></td>
                <td><?= strtoupper($list->Nom_Beni." ".$list->Prenom_Beni)?></td>
                <td><?= strtoupper($list->Nom_Pre_Per)?></td>
                <td><?= strtoupper($list->Lib_Sit)?></td>
                <td><?= strtoupper($list->nbr)?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#detail"  id="<?php echo $Var;?>"             onclick="appell_detal_sortie_arv(id)"> <i class="fa fa-list"></i>&nbsp;Détail</a>
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Beni?>"> <i class="fa fa-edit"></i>&nbsp;ModifiFamion</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-print text-primary"></i>&nbsp;Re-impprimer</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

            </div>
        </div>
    </div>

</div>
</div>
<!-- Nouveau user Logout Modal-->
<div class="modal fade " id="AjoutersORTIARV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ordonnance</h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="index.php?page=Eng_SORTI_ARV">
                <div class="modal-body" id="div1">
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                                        <label>Numéro</label>
                                                        <input type="text"  class="form-control " placeholder="" required="" value="<?php '///'?>" disabled="">
                                                         </div>
                                                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Bénificiaire<span class="text-danger">*<span></label>
                         <select data-style="form-control selecte" required="" name="Code_Beni" class="selectpicker show-tick form-control" data-live-search="true" >
                            <option value=""></option>
                            <?php foreach( Liste_patient_rdv(date('Y-m-d'))  as $beni) {?>
                                    
                                    <option value="<?=$beni->code?>"><?= strtoupper(  $beni->code."   |       ".$beni->Nom_Beni."  ".$beni->Prenom_Beni)?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="col-md-5">
                            <div class="form-group">
                             <label>Site de Prescription<span class="text-danger">*<span></label>
                                <select data-style="form-control selecte" required="" name="Code_Sit" class="selectpicker show-tick form-control" data-live-search="true" >
                            <option value=""></option>
                            <?php foreach( Liste_sitearv() as $sit) {?>
                                    <option value="<?=$sit->Code_Sit?>"><?= strtoupper(  $sit->Lib_Sit.'/ '. $sit->Reg_Sit )?></option>
                                    
                                <?php } ?>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-7">
                                <div class="form-group">
                                    <label>Perscripteur<span class="text-danger">*<span></label>
                                        <input type="text" name="Doc"  class="form-control "  >
                                 </div>
                    </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date de Perscription<span class="text-danger">*<span></label>
                                    <input type="date" name="dateP" class="form-control " onkeypress="chiffres(event)" required="" >
                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date de Traite. delivré<span class="text-danger">*<span></label>
                                    <input type="date" name="dateT" class="form-control " value="<?=date('Y-m-d')?>" required="" >
                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date du prochain RDV<span class="text-danger">*<span></label>
                                    <input type="date" name="RDV" class="form-control " onkeypress="chiffres(event)" required="" >
                                 </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label>Commentaire</label>
                                   <textarea class="form-control " name="obr">
                                       
                                   </textarea>
                                 </div>
                            </div>
                    </div>  
                    

                </div>
                <div class="modal-body" id="div2" style="display: none">
                    <div class="row" >

<div class="col-md-4">
<div class="form-group">
<label>Produit<span class="text-danger"><span></label>
<select data-style="form-control selecte" id="Produit" class="selectpicker show-tick form-control" data-live-search="true" >
     
<option value="" ></option>
<?php foreach( article_categorie(47) as $Art) {
    ?>
<option value="<?=$Art->Code_Art?>" ><?= strtoupper(  $Art->Lib_Art." ".$Art->Lib_Dos )?></option>
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
<th>Produits</th>
<th>Qantité Demandée</th>
<th>Qantité Servie</th>

</table>
<button type="button"  class="delete btn bg-danger" onmouseover="sssssss" style="color: white"><i class="fa fa-trash"></i></button>
<input type="text" id="listEnter" name="listEnter" class="form-control" style="display: none ;"  >
</div>
</div>
                </div>
                <div class="modal-footer">
                    <div id="pageSai" style="position: absolute;left: 0px !important">
                         <h6 class="bg-darkh" style="padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important">Page: 1/2</h6>
                    </div>
                    <a id="etatSuivante"  class="btn btn-success" onclick="suiv_pre()"  >Suivant</a>
                    
                       <button id="EnregARVPRODUIT" style="display: none" type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                  
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>


<div class="modal fade " id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="jj">
                    <div class="row" >
                        
                    <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Perscription<span class="text-danger">*<span></label>
                                        <input type="date" id="1"  class="form-control "  >
                                 </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Date RDV<span class="text-danger">*<span></label>
                         <input type="date" name="" class="form-control selecte" required="" id="2"  disabled="" >
                          
                        </div>
                    </div>
                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Benificiare <span class="text-danger">*<span></label>
                                    <input type="text" id="3" class="form-control " onkeypress="chiffres(event)" disabled="">
                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Perscripteur <span class="text-danger">*<span></label>
                                    <input type="text" id="4" class="form-control " onkeypress="chiffres(event)" disabled="">
                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site <span class="text-danger">*<span></label>
                                    <input type="text" id="5" class="form-control " onkeypress="chiffres(event)" disabled="">
                                 </div>
                            </div>
        
                    <div class="col-md-12" id="ici">
                        
                    </div>
                    

                </div>
                </div>
                <div class="modal-footer">                    
                        <!--<button  type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                         <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button> -->
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
  var sellecttt = document.getElementById('Produit');
  var q1 = document.getElementById('QS');
   var q2 = document.getElementById('QD');
   var stM = document.getElementById('stockN');
  

   function recopier(){
         q1.value=q2.value;
   }
   
     function suiv_pre(){
       
      
      if(document.getElementById("etatSuivante").textContent=="Suivant"){
        document.getElementById("etatSuivante").innerHTML="Précedent";
        document.getElementById("pageSai").innerHTML="<h6 class=\"bg-darkh\" style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 2/2</h6>";
        div1.style.display='none';
        div2.style.display='block';
      }else{
         document.getElementById("etatSuivante").innerHTML="Suivant";
        div1.style.display='block';
        div2.style.display='none';
        document.getElementById("pageSai").innerHTML="<h6 class=\"bg-darkh\" style=\"padding:5px;border-radius:2px;color:black; margin-bottom: 0px !important\">Page: 1/2</h6>";

      }
      
     }

    var QD= document.getElementById("QD");
     var QS =document.getElementById("QS");
  


     function cpy(){
        QS.value=QD.value;
             }

</script>


    </body>
</html>