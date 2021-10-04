<?php

if(isset($_POST['EnregFor']) ){

    $E=Enregistre_forme($_POST['Lib_For']);
           echo "<script language='javascript'> window.location.href ='index.php?page=forme&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiFor'])){
    $E=modification_forme($_POST['Code_For'],$_POST['Lib_For']);
    echo "<script language='javascript'> window.location.href ='index.php?page=forme&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Forme &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Ajouterforme" > <i class="fa fa-file"> </i> &nbsp;Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des Formes</h6>

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
            foreach( Liste_forme() as $list) {?>
            <tr>
                <td><?= Id("For/",$list->Code_For) ?></td>
                <td><?= strtoupper( $list->Lib_For) ?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_For?>"> <i class="fa fa-edit"></i>&nbsp;ModifiForion</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_For?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_For?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"   style="text-align: left;width: 500px;margin: 0px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_For?>">Modification  </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="index.php?page=forme">
                                                    <div class="form-group">
                                                        <label>Code</label>
                                                        <input type="text"  class="form-control " placeholder="" required="" value="<?= Id("For/",$list->Code_For) ?>" disabled="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Libellé<span class="text-danger">*<span></label>
                                                        <input type="text" name="Lib_For" class="form-control " placeholder="" required="" value="<?= $list->Lib_For?>">
                                                        <input type="text" name="Code_For" class="form-control " placeholder="" required="" value="<?= $list->Code_For ?>" style="display:none">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiFor">Enregistrer</button>
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
<div class="modal fade " id="Ajouterforme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success"  style="text-align: left;width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forme</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#s">
                        <div class="form-group">
                        <label>Code</label>
                        <input type="text"  class="form-control " placeholder="" required="" value="<?= Id("For/",$list->Code_For+1) ?>" disabled="">
                    </div>
        <div class="form-group">
                            <label>Libillé<span class="text-danger">*<span></label>
                            <input type="text" name="Lib_For" class="form-control" placeholder="" required="">
                        </div>
                        
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFor">Enregistrer</button>
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