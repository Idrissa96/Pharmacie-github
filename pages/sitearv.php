<?php

if(isset($_POST['EnregSit']) ){

    $E=Enregistre_sitearv($_POST['Lib_Sit'],$_POST['Reg_Sit']);
  
           echo "<script language='javascript'> window.location.href ='index.php?page=sitearv&ok=".$E."'</script>";
       
}elseif(isset($_POST['ModifiFor'])){
    $E=modification_sitearv($_POST['Code_Sit'],$_POST['Lib_Sit'],$_POST['Reg_Sit']);
    echo "<script language='javascript'> window.location.href ='index.php?page=sitearv&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Centre ARV &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Ajoutersite" class="btn" >Ajouter</a>
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
                <h5 class="m-0 font-weight-bold text-black">Liste des Centre ARV</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Code</th>
                <th>Libellé</th>
                <th>Région</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_sitearv() as $list) {?>
            <tr>
                <td><?= Id("For/",$list->Code_Sit) ?></td>
                <td><?= strtoupper( $list->Lib_Sit) ?></td>
                <td><?= strtoupper( $list->Reg_Sit) ?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#ID<?=$list->Code_Sit?>"> <i class="fa fa-edit"></i>&nbsp;ModifiForion</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-trash text-danger"></i>&nbsp;Supprimer</a>
                                </div>
                                <div class="modal fade " id="ID<?=$list->Code_Sit?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$list->Code_Sit?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-left-success"  style="text-align: left;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel<?=$list->Code_Sit?>">Modification </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="index.php?page=sitearv">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label>Code</label>
                                                        <input type="text"  class="form-control " placeholder="" required="" value="<?= Id("For/",$list->Code_Sit) ?>" disabled="">
                                                         </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                        <label>Libellé<span class="text-danger">*</span></label>
                                                        <input type="text" name="Lib_Sit" class="form-control " placeholder="" required="" value="<?= $list->Lib_Sit?>">
                                                        <input type="text" name="Code_Sit" class="form-control " placeholder="" required="" value="<?= $list->Code_Sit ?>" style="display:none">
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Région<span class="text-danger">*</span></label>
                                                        <select data-style="form-control selecte" required="" name="Reg_Sit" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                                                    <option value="<?= $list->Reg_Sit?>"><?= strtoupper( $list->Reg_Sit  )?></option>
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
<div class="modal fade " id="Ajoutersite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Site</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#s">
                        <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label>Code</label>
                                                        <input type="text"  class="form-control " placeholder="" required="" value="<?php if(isset($list->Code_Sit))echo Id("For/",$list->Code_Sit+1); else echo Id("For/",1); ?>" disabled="">
                                                         </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                        <label>Libellé<span class="text-danger">*</span></label>
                                                        <input type="text" name="Lib_Sit" class="form-control " placeholder="" required="" >
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Region<span class="text-danger">*</span></label>
                                                        <select data-style="form-control selecte" required="" name="Reg_Sit" class="selectpicker show-tick form-control" data-style="form-control selecte" >
                                                                    <option value=""></option>
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

                                                </div>
                        
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregSit">Enregistrer</button>
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