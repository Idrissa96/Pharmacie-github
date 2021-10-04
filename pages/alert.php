<?php if(isset($_GET['ok']) and  $_GET['ok'] ==1){
     ?>
                        <div id="notiFamion_enregistrement" >
                            <div class="card border-left-success shadow h-200 py-1" style="position:fixed; top:30px; min-height: 20px;background: rgba(255,255,255,0.5);">
                                <div class="card-body" style="">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1" >
                                               <i class="fa fa-check fa-1x"></i>&nbsp; Operation effectuer avec succès
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <?php
        }elseif(isset($_GET['ok']) and  $_GET['ok'] ==-1){ ?>

                    <div id="notiFamion_enregistrement" >
                            <div class="card border-left-danger shadow h-200 py-1" style="position:fixed; top:30px;min-height: 20px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" >
                                               X &nbsp; Echec de l' Operation 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php } ?>
<script type="text/javascript">
function masquernotifiFamion()
{
  document.getElementById("notiFamion_enregistrement").innerHTML="";
}
 window.setTimeout(masquernotifiFamion, 3000);
</script>
