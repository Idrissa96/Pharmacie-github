<?php
if(isset($_POST['EnregFour']) ){
    $E=Enregistre_Four($_POST['nom'],$_POST['adr'],$_POST['tel'],$_POST['email']);
    echo "<script language='javascript'> window.location.href ='index.php?page=Fournisseur&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiUTI'])){
    $E=modification_Four($_POST['code'],$_POST['nom'],$_POST['adr'],$_POST['tel'],$_POST['email']);
    echo "<script language='javascript'> window.location.href ='index.php?page=Fournisseur&ok=".$E."'</script>";
}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Fournisseur &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterUti" ><i class="fa fa-file"></i>&nbsp; Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des Fournisseur </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; ">
        <thead>
            <tr>
                <th>#ID</th>
                <th>libelle</th>
                
                <th>Telephone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_four() as $list) {?>
            <tr>
                <td><?= Id("Fr",$list->Code_Four) ?></td>
                <td><?= $list->Lib_Four ?></td>
              
                <td><?= $list->Tel ?></td>
                <td><?= $list->Email ?></td>
                <td><?= $list->Adresse ?></td>
                <td style="text-align: center;">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Four?>"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Four?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Four?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Four?>">Modication</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="#">
                                                    <div class="form-group">
                                                        <label>Fournisseur</label>
                                                        <input type="text" name="nom" class="form-control " placeholder="" required="" value="<?= $list->Lib_Four ?>">
                                                        <input type="text" name="code" class="form-control " placeholder="" required="" value="<?= $list->Code_Four ?>" style="display:none">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone</label>
                                                        <input type="text" name="tel" class="form-control " placeholder="" required="" value="<?= $list->Tel ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control " placeholder="" required="" value="<?= $list->Email ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" name="adr" class="form-control " placeholder="" required="" value="<?= $list->Adresse ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Fournisseur</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#s">
                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control " placeholder="" required="" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone</label>
                                                        <input type="text" name="tel" class="form-control " placeholder="" required="" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control " placeholder="" required="" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" name="adr" class="form-control " placeholder="" required="" >
                                                    </div>
                      
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFour">Enregistrer</button>
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

<script type="text/javascript">
function masquernotification()
{
  document.getElementById("notication_enregistrement").innerHTML="";
}
 window.setTimeout(masquernotification, 2000);
</script>

    </body>
</html>