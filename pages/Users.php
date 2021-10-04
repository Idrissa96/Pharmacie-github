<?php

if(isset($_POST['EnregUTI']) ){

    Enregistre_user($_POST['nom'],$_POST['prnom'],$_POST['login'],$_POST['statut'],$_POST['etat']);
           echo "<script language='javascript'> window.location.href ='index.php?page=Users&ok=1'</script>";
}elseif(isset($_POST['ModifiUTI'])){
    modification_user($_POST['iduser'],$_POST['nom'],$_POST['prnom'],$_POST['login'],$_POST['Mpass'],$_POST['statut'],$_POST['etat']);
    echo "<script language='javascript'> window.location.href ='index.php?page=Users&ok=2'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Utilisateurs &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterUti" >Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; ">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Login</th>
                <th>Mode passe</th>
                <th>statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_user() as $list) {?>
            <tr>
                <td><?= Id("Ut/",$list->Id_user) ?></td>
                <td><?= $list->Nom_user ?></td>
                <td><?= $list->Prenom_user ?></td>
                <td><?= $list->Login_user ?></td>
                <td> *******</td>
                <td><?php if($list->statut==1){
                    echo "Admin";
                }else{
                    echo "User";
                } ?></td>
                <td style="text-align: center;">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Id_user?>"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Id_user?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Id_user?>">Modication</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="#">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control " placeholder="" required="" value="<?= $list->Nom_user ?>">
                                                        <input type="text" name="iduser" class="form-control " placeholder="" required="" value="<?= $list->Id_user ?>" style="display:none">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" name="prnom" class="form-control " placeholder="" required="" value="<?= $list->Prenom_user ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" name="login" class="form-control " placeholder="" required="" value="<?= $list->Login_user ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mot de passe</label>
                                                        <input type="text" name="Mpass" class="form-control " placeholder="" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profil</label>
                                                        <select name="statut" class="form-control " required="">
                                                            <option value="<?=$list->statut?>"> <?php if($list->statut==1){
                                                                                echo "Admin";
                                                                            }else{
                                                                                echo "User";
                                                                            } ?></option>
                                                            <option value="1"> Administrateur</option>
                                                            <option value="0">Utilisateur</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>etat du Compte</label>
                                                        <select name="etat" class="form-control " required="">
                                                        <option value="<?=$list->etat?>"> <?php if($list->etat==1){
                                                                                echo "Activer";
                                                                            }else{
                                                                                echo "Bloquer";
                                                                            } ?></option>
                                                            <option value="1"> Activer</option>
                                                            <option value="0">Bloquer</option>
                                                    </select>
                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiUTI">Enregistrer</button>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                                
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
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>

            </div>
        </div>
    </div>

</div>
</div>
<!-- Nouveau user Logout Modal-->
<div class="modal fade " id="AjouterUti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Utilisateur</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#s">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control " placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="prnom" class="form-control " placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control " placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Profil</label>
                            <select name="statut" class="form-control " required="">
                                <option value="1"> Administrateur</option>
                                <option value="0">Utilisateur</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label>etat du Compte</label>
                            <select name="etat" class="form-control " required="">
                                <option value="1"> Activer</option>
                                <option value="0">Bloquer</option>
                           </select>
            </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregUTI">Enregistrer</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    
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