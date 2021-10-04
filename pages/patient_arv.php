<?php

if(isset($_POST['EnregArv']) ){

    $E=Enregistre_patient($_POST['idPatient'],$_POST['NomBni'],$_POST['PrnmBni'],$_POST['SexeBeni'],$_POST['AgeBni'],$_POST['PoidBni'],$_POST['TailleBni'],$_POST['TelBni'],$_POST['mailBni'],$_POST['AdrBni']);
           echo "<script language='javascript'> window.location.href ='index.php?page=patient_arv&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiPatient'])){
    $E=modification_patient($_POST['MidPatient'],$_POST['MNomBni'],$_POST['MPrnmBni'],$_POST['MSexeBeni'],$_POST['MAgeBni'],$_POST['MPoidBni'],$_POST['MTailleBni'],$_POST['MTelBni'],$_POST['MmailBni'],$_POST['MAdrBni']);
   echo "<script language='javascript'> window.location.href ='index.php?page=patient_arv&ok=".$E."'</script>";

}

?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Patient &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#AjouterPatient"  style="border-color:white">Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des Patients</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Nom & Prénom</th>
                <th>Sexe</th>
                <th>Age</th>
                <th>Contact</th>
                <th>Adresse</th>
                <th>Date RDV</th>
                <th style="width:10px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_patient() as $list) {
                $age=date_diff(date_create($list->Date_Nai_Beni),date_create(date('Y-m-d')))->format('%y');
                $line=$list->Code_Beni.'/'.$list->Nom_Beni.'/'.$list->Prenom_Beni.'/'.$age.'/'.$list->Tel.'/'.$list->Adresse.'/'.$list->Poids_Beni.'/'.$list->Taille_Beni;?>
            <tr >
                <td><?= $list->Code_Beni ?></td>
                <td><?= strtoupper(  $list->Nom_Beni." ".$list->Prenom_Beni)?></td>
                <td><?= strtoupper( $list->Sexe_Beni  )?></td>
                <td><?= $age; ?>
                <td><?= formatfrench($list->Tel,'+227')?></td>
                <td><?= strtoupper($list->Adresse)?></td>
                <td><span class="bg-info" style="padding:5px;border-radius:2px;color:white"><?= date_fr($list->Rdv)?></span></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#Detail" id="<?=$line?>" onclick="appell_detal_Beni(id)"> <i class="fa fa-list"></i>&nbsp;Détail</a>
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Beni?>"> <i class="fa fa-edit"></i>&nbsp;Autre</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Beni?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Beni?>" aria-hidden="true"  style="color:black">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Beni?>">Modification</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              <form method="POST" action="#s">
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Identifiant<span class="text-danger">*<span></label>
                                                            <input type="text" name="MidPatient"  class="form-control  " placeholder=""  required="" value="<?= strtoupper( $list->Code_Beni  )?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label>Nom<span class="text-danger">*<span></label>
                                                                    <input type="text" name="MNomBni" class="form-control " placeholder="" required="" value="<?= strtoupper( $list->Nom_Beni)?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Prénom<span class="text-danger">*<span></label>
                                                                        <input type="text" name="MPrnmBni" class="form-control " placeholder="" required="" value="<?= strtoupper( $list->Prenom_Beni  )?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Genre<span class="text-danger">*<span></label>
                                                                    <select data-style="form-control selecte" required="" name="MSexeBeni" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                                                    <option value="<?= strtoupper( $list->Sexe_Beni  )?>"><?= strtoupper( $list->Sexe_Beni)?></option>
                                                                    <option value="G">G</option> 
                                                                    <option value="M">M</option> 
                                                                        </select>
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Age<span class="text-danger">*<span></label>
                                                                    <input type="text" name="MAgeBni" class="form-control " onkeypress="chiffres(event)" required="" value="<?= $age ?>">
                                                                 </div>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Poids(Kg)</label>
                                                                    <input type="text" name="MPoidBni" class="form-control " value="<?= strtoupper($list->Poids_Beni)?>" >
                                                                 </div>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Taille(mettre)</label>
                                                                    <input type="text" name="MTailleBni" class="form-control " value="<?= strtoupper( $list->Taille_Beni  )?>"  >
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Adresse<span class="text-danger">*<span></label>
                                                                    <select data-style="form-control selecte" required="" name="MAdrBni" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                                                    <option value="<?= $list->Adresse?>"><?= strtoupper( $list->Adresse  )?></option>
                                                                    <option value="tillabery">TILLABERY</option>
                                                                    <option value="niamey">NIAMEY</option> 
                                                                    <option value="dosso">DOSSO</option> 
                                                                    <option value="tahoua">TAHOUA</option> 
                                                                    <option value="maradi">MARADI</option>
                                                                    <option value="agadez">AGADEZ</option>   
                                                                    <option value="zinder">ZINDER</option> 
                                                                    <option value="diffa">DIFFA</option> 
                                                                    
                                                                        </select>
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Contact<span class="text-danger">*<span></label>
                                                                    <input type="text" name="MTelBni" class="form-control " value="<?= strtoupper( $list->Tel  )?>" >
                                                                 </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-8" >
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="text" name="MmailBni" class="form-control " placeholder="" value="<?= strtoupper( $list->Email )?>" >
                                                                 </div>
                                                            </div>
                                    
                                                    </div>    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success"  name="ModifiPatient">Enregistrer</button>
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
<div class="modal fade " id="AjouterPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="#s">
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Identifiant<span class="text-danger">*<span></label>
                            <input type="text" name="idPatient"  class="form-control  " placeholder=""  required="">
                        </div>
                    </div>
                     <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nom<span class="text-danger">*<span></label>
                                    <input type="text" name="NomBni" class="form-control " placeholder="" required="">
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prénom<span class="text-danger">*<span></label>
                                        <input type="text" name="PrnmBni" class="form-control " placeholder="" required="">
                                 </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Genre<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" required="" name="SexeBeni" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                    <option value="M">M</option>
                                    <option value="G">G</option> 
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age<span class="text-danger">*<span></label>
                                    <input type="text" name="AgeBni" class="form-control " onkeypress="chiffres(event)" required="" >
                                 </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Poids(Kg)</label>
                                    <input type="text" name="PoidBni" class="form-control "  >
                                 </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Taille(mettre)</label>
                                    <input type="text" name="TailleBni" class="form-control "  >
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse<span class="text-danger">*<span></label>
                                    <select data-style="form-control selecte" required="" name="AdrBni" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                    <option value="tillabery">TILLABERY</option>
                                    <option value="niamey">NIAMEY</option> 
                                    <option value="dosso">DOSSO</option> 
                                    <option value="tahoua">TAHOUA</option> 
                                    <option value="maradi">MARADI</option>
                                    <option value="agadez">AGADEZ</option>   
                                    <option value="zinder">ZINDER</option> 
                                    <option value="diffa">DIFFA</option> 
                                    
                                        </select>
                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact<span class="text-danger">*<span></label>
                                    <input type="text" name="TelBni" class="form-control "  >
                                 </div>
                            </div>
                            
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="mailBni" class="form-control " placeholder="" >
                                 </div>
                            </div>
    
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Nouveau user Logout Modal-->
<div class="modal fade " id="Detail" tabindex="-1" role="dialog" aria-labelledby="Detaillll" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="">
                <div class="modal-header">
                    <h5 class="modal-title" id="Detaillll">DETAIL</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Bénificiare<span class="text-danger"></span></label>
                            <input type="text"  class="form-control " placeholder="" required="" disabled="" id="NomBeniDetail">
                         </div>
                    </div>
                    <div class="col-lg-12" id="ici">
                        
                    </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <form method="post" action="pages/impression.php" target="_blank">
                        <input type="text" name="DetailBenificiare" id="DetailBenificiare" style="display: none;">
                    <button type="submit" class="btn btn-dark" ><i class="fa fa-print"></i> &nbsp; Impprimer</button>
                    </form>
                </div>
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