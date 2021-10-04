<html>
    <head>
        
    </head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" float:top">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Sortie &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#AjouterEntrer"  style="border-color:white"><i class="fa fa-file"></i>&nbsp;&nbsp;Ajouter</a>
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#SortiApp"><i class="fa fa-eye"></i>&nbsp;&nbsp;Autre Liste</a>
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
                <h5 class="m-0 font-weight-bold text-black">Les Sortie du <?php  if(isset($_POST['dateD']))
        {
            echo date_fr($DD=$_POST['dateD'])."  au  ".date_fr($DF=$_POST['dateF']);
        }else{
            echo date_fr(dateAvant(date('Y-m-d'),5))."  au  ".date_fr(date('Y-m-d'));

        } ?> </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8em">
        <thead>
            <tr>
                <th>#Code</th>
                <th>Servicr Benifi.</th>
                <th>Observation</th>
                <th>Date de Sortie</th>
                 <th>Quantité Transf.</th>
                <th>traité par</th>
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
            foreach( Liste_transfere($DD,$DF) as $list) {
                $Var= $list->Code_Tfr."/".$list->Lib_Ser."/".$list->lib."/".$list->Date_Tfr;
                ?>
            <tr >
                <td><?= ID('TFR',$list->Code_Tfr)?></td>
                <td><?= strtoupper($list->Lib_Ser)?></td>
                <td><?= strtoupper($list->lib)?></td>
                <td style="text-align: center"><span class="bg-info" style="padding:5px;border-radius:2px;color:white"><?= date_fr($list->Date_Tfr)?></span></td>
                <td style="text-align: center"><span class="bg-success" style="padding:5px;border-radius:2px;color:white"><?= date_fr($list->nbr)?></span></td>
                 <td><?= strtoupper($list->Nom_user)?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-plus fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#detail" id="<?php echo $Var;?>" onclick="appell_detal(id)"> <i class="fa fa-edit"></i>&nbsp;detail</a>
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
<div class="modal fade " id="AjouterEntrer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="width: 600px; margin-left:10px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="index.php?page=entrerSort">
                    <div class="row" >
        
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Service<span class="text-danger">*</span></label>
                         <select data-style="form-control selecte" required="" name="ServiceD" class="selectpicker show-tick form-control"data-live-search="true" >
                            <option value=""></option>
                            <?php foreach( Liste_service()  as $cat) {?>
                                    <option value="<?=$cat->Code_Ser.','.$cat->Lib_Ser?>"><?= strtoupper($cat->Lib_Ser)?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    

                </div>
                </div>
                <div class="modal-footer">                    
                        <button  type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                         <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Nouveau user Logout Modal-->
<div class="modal fade " id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fiche de Sortie</h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="">
                    <div class="row" >
                        <div class="col-md-5">
                        <div class="form-group">
                        <label>Service<span class="text-success"></span></label>
                        <input type="text"  name="CodeSer" id="code" class="form-control " style="display: none;" >
                        <input type="text"  class="form-control "  id="NANNA" onkeypress="chiffres(event)" disabled=""  >
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                        <label>Date de la Sortie<span class="text-danger">*</span></label>
                        <input type="date"  class="form-control " id="dte" name="dateS"onkeypress="chiffres(event)" required="" >
                        </div>
                        </div>
        
                    <div class="col-md-12" id="ici">
                    </div>
                    

                </div>
                </div>
                <div class="modal-footer">                    
                        <button  type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
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