<?php

if(isset($_POST['EnregDos']) ){

    $E=Enregistre_dosage($_POST['Lib_Dos']);
           echo "<script language='javascript'> window.location.href ='index.php?page=dosage&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiDos'])){
    $E=modification_dosage($_POST['Code_Dos'],$_POST['Lib_Dos']);
    echo "<script language='javascript'> window.location.href ='index.php?page=dosage&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Dosage &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterDosage" >Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des dosages</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Code</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_dosage() as $list) {?>
            <tr>
                <td><?= Id("DOS/",$list->Code_Dos) ?></td>
                <td><?= $list->Lib_Dos ?></td>
                <td style="text-align: center;color:blackSS">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Dos?>"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Dos?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Dos?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"   style="width: 500px;margin: 0px;text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Dos?>">Modication</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="index.php?page=dosage">
                                                     <div class="form-group">
                                                    <label>Code</label>
                                                    <input type="text"  class="form-control " placeholder="" required="" value="<?= Id("Dos/",$list->Code_Dos) ?>" disabled="">
                                                </div>
                                                    <div class="form-group">

                                                        <label>Libellé</label>
                                                        <input type="text" name="Lib_Dos" class="form-control " placeholder="" required="" value="<?= $list->Lib_Dos?>">
                                                        <input type="text" name="Code_Dos" class="form-control " placeholder="" required="" value="<?= $list->Code_Dos ?>" style="display:none">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiDos">Enregistrer</button>
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
<div class="modal fade " id="AjouterDosage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success"  style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dosage</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="#s">
                        <div class="form-group">
                        <label>Code</label>
                        <input type="text"  class="form-control " placeholder="" required="" value="<?php if(isset($list->Code_Dos)) echo Id("Dos/",$list->Code_Dos+1);else echo Id("Dos/",1); ?>" disabled="">
                    </div>
                        <div class="form-group">
                            <label>Libillé</label>
                            <input type="text" name="Lib_Dos" class="form-control " placeholder="" required="">
                        </div>
                        
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregDos">Enregistrer</button>
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