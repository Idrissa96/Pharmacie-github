<html>
    <head>
        
    </head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" float:top">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2>Gestion des Appro. &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-cog fa-sm text-black-50 "></i> &nbsp;Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#AjouterEntrer"  style="border-color:white"><i class="fa fa-file"></i>&nbsp;Ajouter</a>
                <a class="dropdown-item btn-dark" href="#" data-toggle="modal" data-target="#EntrerApp"><i class="fa fa-eye"></i>&nbsp;Autre Liste</a>
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
                <h5 class="m-0 font-weight-bold text-black">Les Entrers du <?php  if(isset($_POST['dateD']))
        {
            echo date_fr($DD=$_POST['dateD'])."  au  ".date_fr($DD=$_POST['dateF']);
        }else{
            echo date_fr(dateAvant(date('Y-m-d'),5))."  au  ".date_fr(date('Y-m-d'));

        } ?> </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black; font-size: 0.8em">
        <thead>
            <tr>
                <th>#Num</th>
                <th>Réf. facture</th>
                <th style="width: 20%">Fournisseur</th>
                <th>Date Appro.</th>
                 <th  style="width: 10%">Nbr d'Articles</th>
                <th>Enterer par</th>
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
            foreach( Liste_app($DD,$DF) as $list) {
                 $Var= $list->Code_App."/".$list->Ref_fac."/".$list->Lib_Four."/".$list->Date_App."/".$list->Code_Four."/".$list->Lib_App;
                 ?>
            <tr >
                <td><?= ID('App',$list->Code_App)?></td>
                <td><?= strtoupper($list->Ref_fac)?></td>
                <td><?= strtoupper($list->Lib_Four)?></td>
                <td style="text-align: center"><span class="bg-info" style="padding:5px;border-radius:2px;color:white"><?= date_fr($list->Date_App)?></span></td>
                <td style="text-align: center"><span class="bg-success" style="padding:5px;border-radius:2px;color:white"><?= date_fr($list->nbr)?></span></td>
                 <td><?= strtoupper($list->Nom_user)?></td>
                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-cog fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#detail" id="<?php echo $Var;?>"             onclick="appell_detal_app(id)"> <i class="fa fa-eye"></i>&nbsp;Détail</a>
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#Modify" id="<?php echo $Var;?>"             onclick="appell_detal_app_modifie(id)"> <i class="fa fa-edit"></i>&nbsp;Modification</a>
                                    <a class="dropdown-item" href="pages/impression.php?Appro=<?=$Var?>" target="_blank"><i class="fa fa-print"></i>&nbsp;Imprimer</a>
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
                <form method="POST" action="index.php?page=entrerApp">
                    <div class="row" >
        
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Catégoririe<span class="text-danger">*</span></label>
                         <select data-style="form-control selecte" required="" name="CatApp[]" class="selectpicker show-tick form-control" multiple data-live-search="true" >
                            <option value=""></option>
                            <?php foreach( Liste_categorie()  as $cat) {?>
                                    <option value="<?=$cat->Code_Cat?>"><?= strtoupper($cat->Lib_Cat)?></option>
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



    <div class="modal fade " id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="jj">
                    <div class="row" >
                        
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label>Réfference<span class="text-danger">*<span></label>
                                        <input type="text" id="det_Ref"  class="form-control " disabled=""  >
                                 </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Fournisseur<span class="text-danger">*<span></label>
                         <input type="text name="" class="form-control" required="" id="FourApp"  disabled=""  >
                          
                        </div>
                    </div>
                   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date d'entrer <span class="text-danger">*<span></label>
                                    <input type="date" id="dataapp" class="form-control " onkeypress="chiffres(event)" disabled="">
                                 </div>
                            </div>
        
                    <div class="col-md-12" id="ici">
                        
                        
                    </div>
                    

                </div>
                </div>
                <div class="modal-footer">                    
                        <!--<button  type="submit" class="btn btn-success"  name="EnregArv">Enregistrer</button>
                         <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>




    <div class="modal fade " id="Modify" tabindex="-1" role="dialog" aria-labelledby="exampleModaljLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModaljLabel"></h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="row" >
                        
                    
        
                    <div class="col-md-12" id="ModifiApp">
                        
                    </div>
                    

                </div>
               
            </div>
        </div>
    </div>

     
    
<div class="row" >
    <div class="col-md-12" id="ici2">
                        
                    </div>
                    
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