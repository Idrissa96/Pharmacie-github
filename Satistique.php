<?php

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
                <h5 class="m-0 font-weight-bold text-black">Tableau de mkjldf,Bord</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">

                <canvas id="bar"  height="250" width="490" style="margin-left: -0px"></canvas>

                                         <script>
                                       var barChartData = {
                                                            labels : ["Jan","Fev","Mars","Avr","Mai","Jun","Jul","Aou","Sep","Oct" ,"Nov","Dec"],
                                                            datasets : [
                                                                {
                                                                    fillColor : "rgba(100,20,200)",
                                                                    strokeColor : "rgb(0,0,2)",
                                                                    data : [65,109,90,81,56,55,150]
                                                                },
                                                                {
                                                                    fillColor : "rgba(0,20,0)",
                                                                    strokeColor : "rgb(0,0,2)",
                                                                    data : [65,109,90,81,56,55,150]
                                                                }
                                                            ]

                                                        };
                                        var myDoughnut =new Chart(document.getElementById("line").getContext("2d")).Bar(barChartData);
                                                   
                                      </script>


   
            </div>
        </div>
    </div>

</div>
</div>

    
    </body>
</html>