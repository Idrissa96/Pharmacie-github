<?php

if(isset($_POST['EnregPrduit']) ){

    $E=Enregistre_article($_POST['Lib_Art'],$_POST['cat'],$_POST['dos'],$_POST['fam'],$_POST['seuil'],$_POST['for']);
           echo "<script language='javascript'> window.location.href ='index.php?page=produit&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiProduit'])){
    $E=modification_article($_POST['code_art'],$_POST['Lib_Art'],$_POST['cat'],$_POST['dos'],$_POST['fam'],$_POST['seuil'],$_POST['for'],$_POST['etat']);
    echo "<script language='javascript'> window.location.href ='index.php?page=produit&ok=".$E."'</script>";

}
//recuperation des produids
//$resul= array();
$Liste_categorie =Liste_categorie();
$Liste_dosage =Liste_dosage();
$Liste_famille =Liste_famille();
$Liste_forme =Liste_forme();
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Produit &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#Ajouterproduit"  style="border-color:white"><i class="fa fa-file"></i>&nbsp;&nbsp;Ajouter</a>
                <a class="dropdown-item" href="#"></a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des produits</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Code</th>
                <th>Désignaton</th>
                <th>Dosage</th>
                <th>Condit. </th>
                <th>Famille</th>
                <th>Categorie</th>
                <th>Min.</th>
                <th style="width:10px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_article() as $list) {?>
            <tr <?php if($list->etat==0) echo "style=\"background:red\"";?>>
                <td><?= Id("PRD/",$list->Code_Art) ?></td>
                <td><?= strtoupper(  $list->Lib_Art)?></td>
                <td><?= strtoupper(  $list->Lib_Dos)?></td>
                <td><?= strtoupper(  $list->Lib_For)?></td>
                <td><?= strtoupper(  $list->Lib_Fam)?></td>
                <td><?= strtoupper(  $list->Lib_Cat)?></td>
                <td style="text-align:center"> <span class="bg-danger" style="padding:5px;border-radius:2px;color:white"><?= strtoupper(  $list->Seuil_Min)?> <span></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Art?>"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Art?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Art?>" aria-hidden="true"  style="color:black">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Art?>">Modification</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="index.php?page=produit">
                                                <div class="row">
                                                     <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Code</label>
                                                                <input type="text" name="" class="form-control  " placeholder="<?= Id("PRD/",$list->Code_Art) ?>"  disabled="">
                                                                <input type="text" name="code_art" class="form-control  " value="<?=$list->Code_Art?>"  style="display:none">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Désignation<span class="text-danger">*<span></label>
                                                                <input type="text" name="Lib_Art" class="form-control " placeholder="" required="" value="<?=$list->Lib_Art?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Dosage<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="dos" class="selectpicker show-tick form-control selecte" data-live-search="true" >
                                                                <option value="<?=$list->Code_Dos?>"><?= strtoupper( $list->Lib_Dos)?></option> 
                                                                <?php foreach( $Liste_dosage as $Dos) {?>
                                                                                                                
                                                                        <option value="<?=$Dos->Code_Dos?>"><?= strtoupper( $Dos->Lib_Dos) ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Conditionnement<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="for" class="selectpicker show-tick form-control" data-live-search="true" >
                                                                <option value="<?=$list->Code_For?>"><?= strtoupper($list->Lib_For)?></option> 
                                                                <?php foreach( $Liste_forme as $for) {?>                                       
                                                                    <option value="<?=$for->Code_For?>"><?= strtoupper(  $for->Lib_For) ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Famille<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="fam" class="selectpicker show-tick form-control" data-live-search="true" >
                                                                <option value="<?=$list->Code_Fam?>"><?= strtoupper( $list->Lib_Fam)?></option> 
                                                                <?php foreach( $Liste_famille as $fam) {?>
                                
                                                                        <option value="<?=$fam->Code_Fam?>"><?= strtoupper(  $fam->Lib_Fam )?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Categorie<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="cat" class="selectpicker show-tick form-control" data-live-search="true" >
                                                                <option value="<?= $list->Code_Cat?>"><?= strtoupper( $list->Lib_Cat)?></option>
                                                                <?php foreach( $Liste_categorie as $cat) {?>
                                                                        
                                                                        <option value="<?=$cat->Code_Cat?>"><?= strtoupper(  $cat->Lib_Cat )?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Seuil Min.<span class="text-danger">*<span></label>
                                                                <input type="text" name="seuil" class="form-control " placeholder="" required="" onkeypress="chiffres(event)" value="<?= $list->Seuil_Min?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>etat<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="etat" class="selectpicker show-tick form-control" >
                                                                <option value="<?= $list->etat?>"><?php if($list->etat==1) echo "Actif";else echo "Inatif";?></option>
                                                                <option value="1">Actif</option>
                                                                <option value="0">Inactif</option>
                                            
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div> 
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiProduit">Enregistrer</button>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                                                
                                            </div>
                                            </form>
                                        </div>
                                    </div>
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
<div class="modal fade " id="Ajouterproduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Produit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="#s">
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Code</label>
                                                                <input type="text"  class="form-control  " placeholder="<?= Id("PRD/",$list->Code_Art+1) ?>"  disabled="">
                                                            </div>
                                                        </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Désignation<span class="text-danger">*<span></label>
                                    <input type="text" name="Lib_Art" class="form-control " placeholder="" required="">
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dosage<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" required="" name="dos" class="selectpicker show-tick form-control" data-live-search="true" >
                                    <option value=""></option> 
                                     <?php foreach( $Liste_dosage as $Dos) {?>
                                                                                    
                                            <option value="<?=$Dos->Code_Dos?>"><?= $Dos->Lib_Dos ?></option>
                                        <?php } ?>
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Conditionnement<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" required="" name="for" class="selectpicker show-tick form-control selecte" data-live-search="true" style="background: red" >
                                    <option value=""></option> 
                                    <?php foreach( $Liste_forme as $for) {?>                                       
                                        <option value="<?=$for->Code_For?>"><?= strtoupper(  $for->Lib_For) ?></option>
                                        <?php } ?>
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Famille<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" required="" name="fam" class="selectpicker show-tick form-control" data-live-search="true" data-style="form-control selecte" >
                                    <option value=""></option> 
                                    <?php foreach( $Liste_famille as $fam) {?>
      
                                            <option value="<?=$fam->Code_Fam?>"><?= strtoupper(  $fam->Lib_Fam )?></option>
                                        <?php } ?>
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Categorie<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" style="background: red !important; font-family: go;font-style:italic;"  required="" name="cat" class="selectpicker show-tick form-control bg-danger selecte" data-live-search="true"  >
                                    <option value=""></option>
                                     <?php foreach( $Liste_categorie as $cat) {?>
                                            
                                            <option value="<?=$cat->Code_Cat?>"><?= strtoupper(  $cat->Lib_Cat )?></option>
                                        <?php } ?>
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Seuil Min.<span class="text-danger">*<span></label>
                                    <input type="text" name="seuil" class="form-control " placeholder="" required="" onkeypress="chiffres(event)">
                                 </div>
                            </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  name="EnregPrduit">Enregistrer</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
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

    </body>
</html>