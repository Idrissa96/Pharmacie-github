<?php
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;margin-botton: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2> &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-cog fa-sm text-black-50 "></i> &nbsp;Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item " href="#" data-toggle="modal" data-target="#etat"  style="border-color:white"><i class="fa fa-print">&nbsp;Stock </i></a>
                <a class="dropdown-item" href="pages/impression.php?stockPerime" target="_blank"><i class="fa fa-print">&nbsp;Stock Périmé </i></a>
                 <a class="dropdown-item" href="pages/impression.php?inventaire" target="_blank"><i class="fa fa-print">&nbsp;Fiche d'inventaire </i></a>
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
                <h5 class="m-0 font-weight-bold text-black">Stock actuel</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">


    <table id="Id01" class="table table-striped table-bordered" style="width:100%; color:black">
        <thead>
            <tr>
                <th>Code</th>
                <th>Désignaton</th>
                <th>Dosage</th>
                <th>Condit. </th>
                <th>Famille</th>
                <th>Categorie</th>
                <th>Stock</th>
                <th style="width:10px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach( Liste_stoct_courant() as $list){
                 $Var= $list->Code_Art."/".$list->Lib_Art."/".$list->Lib_Dos."/".$list->Lib_For."/".$list->Lib_Fam."/".$list->Lib_Cat;?>
            <tr >
                <td><?= Id("Prd/",$list->Code_Art) ?></td>
                <td><?= strtoupper(  $list->Lib_Art)?></td>
                <td><?= strtoupper(  $list->Lib_Dos)?></td>
                <td><?= strtoupper(  $list->Lib_For)?></td>
                <td><?= strtoupper(  $list->Lib_Fam)?></td>
                <td><?= strtoupper(  $list->Lib_Cat)?></td>
                    <td style="text-align:center"> <span class="<?php if($list->Seuil_Min<$list->nbr) echo 'bg-success';else echo 'bg-danger'; ?>" style="padding:5px;border-radius:2px;color:white"><?= strtoupper($list->nbr)?> <span></td>
                     

                <td style="text-align: center;color:black">
                    
                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle " href="#" role="button" id="idaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                class="fas fa-cog fa-sm"></i> Actions </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="idaction">
                                    <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#detail" id="<?php echo $Var;?>"             onclick="appell_detal_produit(id)" > <i class="fa fa-list"></i>&nbsp;Mouvement</a>

                                    <a  class="dropdown-item" href="pages/impression.php?donne=<?php echo $Var;?>" target="_blank"> <i class="fa fa-print"></i>&nbsp;Fiche de mouvement</a>
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
  <!-- Nouveau user Logout Modal-->
<div class="modal fade " id="etat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paramétre de Selection</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./pages/impression.php"  target="_blank">

                      <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                               <label>Produit<span class="text-danger">*<span></label>
                                                                <select data-style="form-control selecte" required="" name="ProduitImpri[]" class="selectpicker show-tick form-control" data-live-search="true" multiple="" >
                                                                <option value="tt"><?= strtoupper("tous")?></option>
                                                        <?php 
                                                        foreach(Liste_article() as $prd){?>

                                                                <option value=" <?= $prd->Code_Art ?>"><?= strtoupper($prd->Lib_Art.'  '.$prd->Lib_Dos)?></option>

                                                                 <?php } ?>
                                                                
                                                                </select>
                            </div>
                          </div>
                            
                        </div>                      
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="ImpProduit" >Valider</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade " id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success"  style="width: 800px;margin-left: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5> 
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="jj">
                    <div class="row" >
                        
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Produit</label>
                                        <input type="text" id="duit"  class="form-control "  >
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