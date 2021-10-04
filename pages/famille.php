<?php

if(isset($_POST['EnregFam']) ){

    $E=Enregistre_famille($_POST['Lib_Fam']);
           echo "<script language='javascript'> window.location.href ='index.php?page=famille&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiFam'])){
    $E=modification_famille($_POST['Code_Fam'],$_POST['Lib_Fam']);
    echo "<script language='javascript'> window.location.href ='index.php?page=famille&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Famille &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn" href="#" data-toggle="modal" data-target="#Ajouterfamille" > <i class="fa fa-file"></i>&nbsp; Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des Familles</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size: 0.8rem" >


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black;">
        <thead>
            <tr>
                <th>Code</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_famille() as $list) {?>
            <tr >
                <td><?= Id("Fam/",$list->Code_Fam) ?></td>
                <td><?= strtoupper( $list->Lib_Fam )?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Fam?>"> <i class="fa fa-edit"></i>&nbsp;ModifiFamion</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Fam?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Fam?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;width: 500px;margin: 0px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Fam?>">Famille:  </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="index.php?page=famille">
                                                    <div class="form-group">
                        <label>Code</label>
                        <input type="text"  class="form-control " placeholder="" required="" value="<?php echo Id("Fam/",$list->Code_Fam+1);?>" disabled="">
                    </div>
                                                    <div class="form-group">
                                                        <label>Libellé <span class="text-danger">*<span></label>
                                                        <input type="text" name="Lib_Fam" class="form-control " placeholder="" required="" value="<?= $list->Lib_Fam?>">
                                                        <input type="text" name="Code_Fam" class="form-control " placeholder="" required="" value="<?= $list->Code_Fam ?>" style="display:none">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiFam">Enregistrer</button>
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
<div class="modal fade " id="Ajouterfamille" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success"  style="text-align: left;width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel " >Famille</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="form-group">
                        <label>Code</label>
                        <input type="text"  class="form-control " placeholder="" required="" value="<?php if(isset($list->Code_Fam)) echo Id("Fam/",$list->Code_Fam+1);else echo Id("Fam/",1); ?>" disabled="">
                    </div>
                        <div class="form-group">
                            <label>Libillé</label>
                            <input type="text" name="Lib_Fam" class="form-control " placeholder="" required="">
                        </div>
                        
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFam">Enregistrer</button>
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