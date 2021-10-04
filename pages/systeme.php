<?php

if(isset($_POST['EnregSer']) ){

    $E=Enregistre_Systeme($_POST['Lib_Ser'],$_POST['Agent_Ser']);
           echo "<script language='javascript'> window.location.href ='index.php?page=Systeme&ok=".$E."'</script>";
}elseif(isset($_POST['ModifiSer'])){
    $E=modification_Systeme($_POST['Code_Ser'],$_POST['Lib_Ser'],$_POST['Agent_Ser']);
    echo "<script language='javascript'> window.location.href ='index.php?page=Systeme&ok=".$E."'</script>";

}
?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-lg-flex">
    <div class="d-sm-flex align-items-center justify-content-between mb-4" ><h2>Systeme &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;"><i
                                class="fas fa-plus fa-sm text-black-50 "></i>Actions</a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterSysteme" > <i class="fa fa-check"></i>&nbsp; Valider les Changément</a>
            </div>
        </h2>
    </div>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-md-7">
        <div class="card shadow mb-4 border-left-success"  style="min-height: 200px"  >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black">Systemes</h6>


            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:1em">

                <div class="form-group">
                            <label>Nom du Logiciel<span class="text-danger">*<span></label>
                            <input type="text" name="Lib_For" class="form-control" placeholder="" required="" value="phama+">
                        </div>
                        <div class="form-group">
                            <label>nombre de ligne des tables par defaut <span class="text-danger">*<span></label>
                            <input type="text" name="Lib_For" class="form-control" placeholder="" required="" value="10">
                        </div>

            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    </div>
    <div class="col-md-5">
        <div class="card shadow mb-4 border-left-success" style="min-height: 200px" >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black">Logo</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">

                <div class="form-group">
                            <img src="./img/logo_pharmacie.png" width="350" height="150">
                            <input type="file" name="Lib_For" class="form-control" placeholder="" required="" value="10">
                        </div>
    
            </div>
        </div>
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