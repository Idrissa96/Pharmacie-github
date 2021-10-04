<?php

if(isset($_POST['EnregSer']) ){

    $E=Enregistre_Service($_POST['Lib_Ser'],$_POST['Agent_Ser']);
           echo "<script language='javascript'> window.location.href ='index.php?page=service&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiSer'])){
    $E=modification_Service($_POST['Code_Ser'],$_POST['Lib_Ser'],$_POST['Agent_Ser']);
    echo "<script language='javascript'> window.location.href ='index.php?page=service&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-lg-flex" >
    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-botton: 0px;"><h2>Service &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterService" > <i class="fa fa-file"></i>&nbsp;&nbsp;Ajouter</a>
                <a class="dropdown-item" href="#"></a>
            </div>
        </h2>
    </div>
</div>

<div class="row" >

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4 border-left-success" >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black">Liste des Services</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Code</th>
                <th>Libellé</th>
                <th>Responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_Service() as $list) {?>
            <tr>
                <td><?= Id("SVC/",$list->Code_Ser) ?></td>
                <td><?= $list->Lib_Ser ?></td>
                <td><?= $list->Agent ?></td>
                <td style="text-align: center;color:blackSS">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Ser?>"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Ser?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Ser?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="width: 500px;margin: 0px;text-align: left;" >
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Ser?>">Service N<sup>o</sup>: <?=Id("SVC/",$list->Code_Ser) ?></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="#">
                                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text"  class="form-control " placeholder="" required="" value="<?php if(isset($list->Code_Ser)) echo Id("Ser/",$list->Code_Ser);else echo Id("Ser/",1); ?>" disabled="">
                                    </div>
                                                    <div class="form-group">
                                                        <label>Libellé <span class="text-danger">*<span></label>
                                                        <input type="text" name="Lib_Ser" class="form-control " placeholder="" required="" value="<?= $list->Lib_Ser?>">
                                                        <input type="text" name="Code_Ser" class="form-control " placeholder="" required="" value="<?= $list->Code_Ser ?>" style="display:none">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Responsable</label>
                                                        <input type="text" name="Agent_Ser" class="form-control " placeholder="" value="<?= $list->Agent ?>">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"  name="ModifiSer">Enregistrer</button>
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
<!-- Nouveau uSer Logout Modal-->
<div class="modal fade " id="AjouterService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success"  style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Service</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#s">
                         <div class="form-group">
                                        <label>Code</label>
                                        <input type="text"  class="form-control " placeholder="" required="" value="<?php if(isset($list->Code_Ser)) echo Id("Ser/",$list->Code_Ser+1);else echo Id("Ser/",1); ?>" disabled="">
                                    </div>
                        <div class="form-group">
                            <label>Libillé <span class="text-danger">*<span></label>
                            <input type="text" name="Lib_Ser" class="form-control " placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Responsable</label>
                            <input type="text" name="Agent_Ser" class="form-control " placeholder="">
                        </div>
                        
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregSer">Enregistrer</button>
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