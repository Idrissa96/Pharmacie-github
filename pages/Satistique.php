<?php

?>

<html>
    <head></head>
    <body>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="sidebar-card d-none d-lg-flex" style=" margin-top: -20px;mar: -20px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"><h2> &nbsp;</h2> </span>

            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:  110px;">
                </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated-fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#AjouterDosage" >Ajouter</a>
                <a class="dropdown-item" href="#"></a>
            </div>
        </h2>
    </div>
</div>

<div class="row" style="margin-top: -10px;">

    <!-- Area Chart -->
   
     <div class="col-md-8">
            <div class="shadow mb-4 border-left-success" >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black"></h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">
            <!-- Card Header - Dropdown -->
            <canvas id="myChart3" height="100" width="220"  ></canvas>
                <script>
                  
                var ctx = document.getElementById('myChart3').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Fer', 'Mar', 'Avr', 'Mai', 'Jui', 'Jul', 'Aut', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                          label: 'My First Dataset',
                          data: [10, 20, 30, 40, 50, 40,40, 50, 40, 30,2],
                          fill: false,
                          borderColor: 'rgb(0, 0, 255)',
                           backgroundColor:'rgba(0,0,0,0.25)',
                          tension: 0.1,
                            borderWidth: 1
                        },{
                          label: 'My First Dataset',
                          data: [40, 50, 40,105, 99, 80, 45, 36, 30, 0,150],
                          fill: false,
                          borderColor: 'rgb(0, 255, 0)',
                           backgroundColor:'rgba(0,0,0,0.25)',
                          tension: 0.1,
                            borderWidth: 1
                        },{
                          label: 'My First Dataset',
                          data: [18,0, 59, 80, 81, 56, 55,40, 50, 40, 40,30],
                          fill: false,
                          borderColor: 'rgb(255, 0, 0)',
                           backgroundColor:'rgba(0,0,0,0.25)',
                          tension: 0.1,
                            borderWidth: 1
                        }]
                    },
                    options: {
                      animation:true,
                       
                      plugins: {
                        title: {
                            display: true,
                            text: 'Custom Chart Title'
                        }
                      },
                      layout: {
                            padding: {
                                left: 0, right:0,bottom:10
                            }
                        }


                    }
                });
                </script>
              </div>
        </div>
    </div>
     <div class="col-md-4">
            <div class="shadow mb-4 border-left-danger" >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-black"> <i class="fa fa-bell"></i> Alert</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body" style="font-size:0.8em">
            <!-- Card Header - Dropdown -->
           <table class="table table-striped table-bordered" style="width:100%; color:black">
            
        <tbody>
            <tr >
                <td > <i class="fa fa-arrow-down"></i>Entrer</td>
            </tr>
            <tr  >
                <td > <i class="fa fa-arrow-up"></i> Entrer</td>
            </tr>
            <tr  >
                <td  ><i class="fa fa-bell"> </i>Alert1</td>
            </tr>
            <tr  >
                <td > <i class="fa fa-bell"> </i>alert2</td>
            </tr>
            <tr  >
                <td > <i class="fa fa-bell"> </i>alert3</td>
            </tr>
          </tbody>
        </table>
              </div>
        </div>
    </div>
   </div>
     </div>
     <br><br><br><br><br><br><br><br><br><br><br><br>v
</html>