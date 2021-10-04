<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if (!isset($_SESSION['ID']))
     header("location:../login.php");
/// LES FONCTION ICI

require("./dBase/connection.php");
 require("pages/fonctions/select_Insert.php");
 require("pages/fonctions/fonction_base.php");
    @$PAGE="Satistique.php";
    $pages=scandir('./pages');
        if(isset($_GET['page']) and in_array($_GET['page'].'.php',$pages)){
            $PAGE=$_GET['page'].".php";
        }
         require("pages/marque/entete_page.php");
        ?>
<body id="page-top">
    <?php 
    ///*/
        require("pages/marque/body.php");
        
    // retour au debut de la page to Top Button
         echo "<a class=\"scroll-to-top rounded\" href=\"#page-top\"><i class=\"fas fa-angle-up\"></i></a>";
         require("pages/marque/bas_page.php");
    ?>
</body>
</html>