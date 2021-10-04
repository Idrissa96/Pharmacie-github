<html>
    <head>


    </head>
    <body>
        
   
    <!-- Logout Modal-->
    <div class="modal fade " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Compte N<sup>o</sup> : <?=Id("Ut/",$_SESSION['ID'])?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form method="POST" action="#">
                           
                              <div class="row">
                                <div class="col-md-7">
                                   <div class="form-group">
                                     <label>Nom</label>
                                      <input type="text" name="nom" class="form-control " placeholder="" required="" value="<?php  if(isset($_SESSION['Nom_user'])) echo $_SESSION['Nom_user']; ?>">
                                      <input type="text" name="iduser" class="form-control " placeholder="" required="" value="<?php if(isset($_SESSION['ID'])) echo $_SESSION['ID'];?>" style="display:none">
                                  </div>
                                  
                                </div>
                              <div class="col-md-5"> 
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="prnom" class="form-control " placeholder="" required="" value="<?php if(isset($_SESSION['Pr_user'])) echo $_SESSION['Pr_user']; ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" name="login" class="form-control " placeholder="" required="" value="<?php if(isset($_SESSION['login'])) echo $_SESSION['login'];?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="text" name="Mpass" class="form-control " placeholder="" >
                            </div>
                          </div>
                          </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  name="ModifiUTI" onclick="return(confirm('etes vous sur d\'apporter cette/ces  modification ?' ));">Enregistrer</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                                
                            </div>
                            </form>


            
            </div>
        </div>
    </div>

    <!-- Nouveau user Logout Modal-->
<div class="modal fade " id="SortiARV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Délimitation de la selection</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?page=SortieARV">

                      <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date début</label>
                                <input type="date"  class="form-control " placeholder="" required=""value="<?=dateAvant(date('Y-m-d'),5)?>">
                            </div>
                          </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date fin</label>
                                <input type="date"  class="form-control " placeholder="" required="" value="<?=date('Y-m-d')?>">
                              </div>
                            </div>
                        </div>                      
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFor">Valider</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
      <!-- Enterer en stock-->
<div class="modal fade " id="EntrerApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Délimitation de la selection</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?page=app">

                      <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date début</label>
                                <input type="date" name="dateD"  class="form-control " placeholder="" required=""value="<?=dateAvant(date('Y-m-d'),5)?>">
                            </div>
                          </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date fin</label>
                                <input type="date" name="dateF" class="form-control " placeholder="" required="" value="<?=date('Y-m-d')?>">
                              </div>
                            </div>
                        </div>                      
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFor">Valider</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
  <div class="modal fade " id="SortiApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content border-left-success" style="width: 500px;margin: 0px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Délimitation de la selection</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?page=SortieApp">

                      <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date début</label>
                                <input type="date" name="dateD"  class="form-control " placeholder="" required=""value="<?=dateAvant(date('Y-m-d'),5)?>">
                            </div>
                          </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>Date fin</label>
                                <input type="date" name="dateF" class="form-control " placeholder="" required="" value="<?=date('Y-m-d')?>">
                              </div>
                            </div>
                        </div>                      
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success"  name="EnregFor">Valider</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
 <!-- Bootstrap core JavaScript-->
 
 <script  src="vendor/datatables/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js" type="text/javascript"></script>

    <script src="vendor/select/js/bootstrap-select.js"></script>
    <!-- Custom scripts for tables-->

   
<script type="text/javascript" src="vendor/datatables/jquery.dataTables.js" type="text/javascript"></script>

<script type="text/javascript">
      // Mettez le code javascript ici. 
      $(document).ready(function() {
     $('#Id01').DataTable({
        pagingType: "full_numbers",
        pageLength: 10,
        order: [[0, 'desc']
        ]
    });



     



     $(".add2").click(function() {

        var nom = $("#prdtApp").val();
        var QQ = $("#QQ").val();
        var OB = $("#OB").val();
        var EXp = $("#datxp").val();

        if(QQ !=0 && EXp !='' && nom!=0){
         
           VariableEntrer=VariableEntrer+",Prd"+ind;
          $("#listEnter").val(VariableEntrer);
           
          
          var detaille=$("#prdtApp option:selected").text();
          var ligne="<tr style=\"background: white;\"><td><input type='checkbox' name='select' Value=',Prd"+ind+"' style='min-width: 2px;border:0px'></td><td><input style='min-width: 2px;border:0px;display:none' type='text' name='Prd"+ind+"'value='"+nom+"'>Prd/"+nom+"</td><td>"+detaille+"<td><input style='min-width: 2px;border:0px' type='text' name='QQ"+ind+"'value='"+QQ+"'></td></td><td><input style='min-width: 2px;border:0px' type='date' name='datxp"+ind+"'value='"+EXp+"'></td><td><input style='display:none' type='text' name='OB"+ind+"'value='"+OB+"'></td><tr>";
        $("table.ListeProduit").append(ligne);
        $("#prdtApp").val(0);
         $("#QQ").val(0);
         $("#datxp").val('');
         ind+=1;
         document.getElementById('EnregARVPRODUIT').style.display='block';
          }else{
            alert('Veillez remplire touts les champs obligatoire!');
          }
    });




     $(".add").click(function() {
        var nom = $("#Produit").val();
        var QD = $("#QD").val();
        var QS = $("#QS").val();
        var stock = parseInt($("#stock").val());
        if(QD !=0 && QS !=0 && nom!=0 && stock>= QS ){
           VariableEntrer=VariableEntrer+",Prd"+ind;
          $("#listEnter").val(VariableEntrer);
           
          var detaille=$("#Produit option:selected").text();
         var ligne = "<tr style=\"background: white;\"><td><input type='checkbox' name='select' Value=',Prd"+ind+"' style='min-width: 2px;border:0px'></td><td><input style='min-width: 2px;border:0px;display:none' type='text' name='Prd"+ind+"'value='"+nom+"'>Prd/"+nom+"</td><td>"+detaille+"<td><input style='min-width: 2px;border:0px' type='text' name='QD"+ind+"'value='"+QD+"'></td></td><td><input style='min-width: 2px;border:0px' type='text' name='QS"+ind+"'value='"+QS+"'></td><tr>";
        $("table.ListeProduit").append(ligne);
        $("#Produit").val(0);
       $("#QD").val(0);
        $("#QS").val(0);
        $("#Produit").focus();
        ind+=1;
        document.getElementById('EnregARVPRODUIT').style.display='block';
          }else{
            if(stock<QS)
            alert('Impossible de valider cette demande');
          }
    });
    $(".delete").click(function() {
        $("table.ListeProduit").find('input[name="select"]').each(function() {
            if ($(this).is(":checked")) {
                
                VariableEntrer=VariableEntrer.replace($(this).val(),'');
                $("#listEnter").val(VariableEntrer);
              
                $(this).parents("table.ListeProduit tr").remove();
            }
        });
    });
});
  



  /////
   $(function () {
  $("#Produit").on("change", function(value) {
   var selectedD =  $("#Produit").val();
   if(selectedD!='')
     $("#la").load("./pages/stok_Produit.php",{donne:selectedD});
  });
});

///
    function appell_detal(id){
      var donnes= id.split('/');
      var donne=donnes[0];
       $("#code").val(donnes[0]);
      $("#NANNA").val(donnes[1]);
      $("#dte").val(donnes[3]);
         
           $("#ici").load("./pages/detail_soti_Service.php",{donne:donne});

    }

    function appell_detal_app(id){
      var donnes= id.split('/');
      var donne=donnes[0];
      $("#det_Ref").val(donnes[1]);
      $("#FourApp").val(donnes[2]);
      $("#dataapp").val(donnes[3]);
         
           $("#ici").load("./pages/detail_entrer_produit.php",{donne:donne});

    }
    function appell_detal_app_modifie(id){
      var donnes= id;
         
           $("#ModifiApp").load("./pages/Modifie_App.php",{donne:donnes});

    }

    

    function appell_detal_produit(id){
      var donnes= id.split('/');
      var donne=donnes[0];
      $("#duit").val(donnes[1]+" "+donnes[2]);
         
           $("#ici").load("./pages/detail_produit.php",{donne:id});

    }
function chiffres(event) {
// Compatibilité IE / Firefox
if(!event&&window.event) {
event=window.event;
}
// IE
if(event.keyCode < 48 || event.keyCode > 57) {
event.returnValue = false;
event.cancelBubble = true;
}
// DOM
if(event.which < 48 || event.which > 57) {
event.preventDefault();
event.stopPropagation();
}
}

</script>