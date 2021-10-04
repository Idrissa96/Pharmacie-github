
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <title>Pharma+</title>
  <!-- Custom fonts for this template-->
  <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.css" rel="stylesheet">
  <link href="./2.css" rel="stylesheet">
</head>

<body style=" background: linear-gradient(45deg, rgb(0, 79, 24), rgb(66, 207, 141),rgb(5, 19, 19));">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center  " style="margin-top: 90px;background:#1241">

      <div class="col-xl-10 col-lg-10 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-2">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" >
              <div class="col-lg-6 d-lg-block ">

                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 9000rem;padding-top: 5rem; border-radius: 50px" src="img/logo_pharmacie.png" alt=""  width="300px" height="70px">
              </div>
              <div class="col-lg-5">
                <div class="p-6">
                <br><br><br>
                  <div class="text-center">
                    <h1 class="h2 text-gray-800 mb-4 ">Bienvenue sur<span class="text-danger"> Pharma+</span> !</h1>
                  </div>
                  <form class="user" method="post" action="dBase/veri_log_mp.php" style="margin:20px">
                    <div class="form-group">
                      <input type="text" class="form-control "   placeholder="Entre votre nom d'utilisateur..." name="login" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control"  placeholder="Mots de passe" name="mps" required="">
                    </div>
                    <div class="form-group">
                    </div>
                    <hr>
                    <Button type="submit" class="btn bg-success btn-block">
                     <span class="h5"style="color: black "> Se connecter </span>
                    </Button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <p></p>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 

</body>

</html>
