<?php
////Gestion des Utilisateurs
function Enregistre_user($donne1,$donne2,$donne3,$donne4,$donne5)
{	///Ajout utilisateur 
	global $bd;
	$donne=md5("1234");
		$sql= "INSERT INTO utilisateur(Nom_user,Prenom_user,Login_user, Mpasse, statut, etat) Value(:Nom_user,:Prenom_user,:Login_user, :Mpasse, :statut, :etat);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('etat'=>$donne5,
		'statut'=>$donne4,
			'Mpasse'=>$donne, 
			'Login_user'=>$donne3,
	    	'Prenom_user'=>$donne2,
			'Nom_user'=>$donne1
		));
	
}
function Liste_user(){ //selection de touts les utilisateur 
	global $bd;
	$resul= array();
	$req=$bd->query("SELECT * FROM utilisateur ");
while ($row=$req->fetchObject()) {
		$resul[]=$row;
	}
return $resul;

}
function modification_user($donne1,$donne2,$donne3,$donne4,$donne5,$donne6,$donne7){
	global $bd;
	if(!empty($donne5)){
	$modif=$bd->prepare('UPDATE utilisateur SET Nom_user=:Nom_user,Prenom_user=:Prenom_user,Login_user=:Login_user, Mpasse=:Mpasse, statut=:statut, statut=:etat WHERE Id_user=:Id_user');
     $modif->execute(array('etat'=>$donne7,
	 'statut'=>$donne6,
		 'Mpasse'=>md5($donne5), 
		 'Login_user'=>$donne4,
		 'Prenom_user'=>$donne3,
		 'Nom_user'=>$donne2,
		 'Id_user'=>$donne1
	 ));
	}else{
		$modif=$bd->prepare('UPDATE utilisateur SET Nom_user=:Nom_user,Prenom_user=:Prenom_user,Login_user=:Login_user,  statut=:statut, statut=:etat WHERE Id_user=:Id_user');
     $modif->execute(array('etat'=>$donne7,
	 'statut'=>$donne6, 
		 'Login_user'=>$donne4,
		 'Prenom_user'=>$donne3,
		 'Nom_user'=>$donne2,
		 'Id_user'=>$donne1
	 ));
	}
} 
////Gestion de la tables dosage
function Enregistre_dosage($donne1)
{	///Ajout type de dosage
	global $bd;
///verification si le dosage existe deja
	$req=$bd->query("SELECT * FROM dosage where Lib_Dos='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO dosage(Lib_Dos) Value(:Lib_Dos);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Dos'=>$donne1,
		));
	}
		
	return $E;
}

function Liste_dosage(){
	//selection de touts les types de dosages
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM dosage ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_dosage($donne1,$donne2){
	global $bd;
	$req=$bd->query("SELECT * FROM dosage where Lib_Dos='$donne2' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE dosage SET Lib_Dos=:Lib_Dos WHERE Code_Dos=:Code_Dos');
     $modif->execute(array('Code_Dos'=>$donne1,
		 'Lib_Dos'=>$donne2
	 ));
	 $E=1;
	}
	return $E;
} 

////Gestion de la tables Service
function Enregistre_Service($donne1,$donne2)
{	///Ajout type de Service
	global $bd;
///verification si le Service existe deja
	$req=$bd->query("SELECT * FROM Service where Lib_Ser='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO Service(Lib_Ser, Agent) Value(:Lib_Ser,:Agent);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Ser'=>$donne1,'Agent'=>$donne2
		));
	}
		
	return $E;
}

function Liste_Service(){
	//selection de touts les types de Services
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM Service ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_Service($donne1,$donne2,$donne3){
	global $bd;
	$req=$bd->query("SELECT * FROM Service where Lib_Ser='$donne2' and Agent='$donne3' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE service SET Lib_Ser=:Lib_Ser, Agent=:Agent WHERE Code_Ser=:Code_Ser');
     $modif->execute(array('Code_Ser'=>$donne1,
		 'Lib_Ser'=>$donne2,
		 'Agent'=>$donne3
	 ));
	 $E=1;
	}
	return $E;
} 

////Gestion de la tables categorie
function Enregistre_categorie($donne1)
{	///Ajout type de categorie
	global $bd;
///verification si le categorie existe deja
	$req=$bd->query("SELECT * FROM categorie where Lib_Cat='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO categorie(Lib_Cat) Value(:Lib_Cat);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Cat'=>$donne1,
		));
	}
		
	return $E;
}

function Liste_categorie(){
	//selection de touts les types de categories
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM categorie where 1 order by Lib_Cat asc");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_categorie($donne1,$donne2){
	global $bd;
	$req=$bd->query("SELECT * FROM categorie where Lib_Cat='$donne2' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE categorie SET Lib_Cat=:Lib_Cat WHERE Code_Cat=:Code_Cat');
     $modif->execute(array('Code_Cat'=>$donne1,
		 'Lib_Cat'=>$donne2
	 ));
	 $E=1;
	}
	return $E;
} 


////Gestion de la tables Famille

function Enregistre_famille($donne1)
{	///Ajout type de famille
	global $bd;
///verification si le famille existe deja
	$req=$bd->query("SELECT * FROM famille where Lib_Fam='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO famille(Lib_Fam) Value(:Lib_Fam);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Fam'=>$donne1,
		));
	}
		
	return $E;
}


function Liste_famille(){
	//selection de touts les types de familles
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM famille ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_famille($donne1,$donne2){
	global $bd;
	$req=$bd->query("SELECT * FROM famille where Lib_Fam='$donne2' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE famille SET Lib_Fam=:Lib_Fam WHERE Code_Fam=:Code_Fam');
     $modif->execute(array('Code_Fam'=>$donne1,
		 'Lib_Fam'=>$donne2
	 ));
	 $E=1;
	}
	return $E;
} 

////Gestion de la tables forme

function Enregistre_forme($donne1)
{	///Ajout type de forme
	global $bd;
///verification si le forme existe deja
	$req=$bd->query("SELECT * FROM forme where Lib_For='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO forme(Lib_For) Value(:Lib_For);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_For'=>$donne1,
		));
	}
		
	return $E;
}


function Liste_forme(){
	//selection de touts les types de formes
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM forme ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_forme($donne1,$donne2){
	global $bd;
	$req=$bd->query("SELECT * FROM forme where Lib_For='$donne2' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE forme SET Lib_For=:Lib_For WHERE Code_For=:Code_For');
     $modif->execute(array('Code_For'=>$donne1,
		 'Lib_For'=>$donne2
	 ));
	 $E=1;
	}
	return $E;
} 

////Gestion de la tables artile 

function Enregistre_article($donne1,$donne2,$donne3,$donne4,$donne5,$donne6)
{	///Ajout type de article
	global $bd;
///verification si le article existe deja
	$req=$bd->query("SELECT * FROM article where Lib_Art='$donne1' and Code_Cat=$donne2 and Code_Dos=$donne3 and Code_Fam=$donne4 and Code_For=$donne6 ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO article(Lib_Art ,Code_Cat,Code_Dos,Code_Fam,Seuil_Min,Code_For) Value(:Lib_Art ,:Code_Cat, :Code_Dos,:Code_Fam,:Seuil_Min,:Code_For);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Art'=>$donne1,'Code_Cat'=>$donne2,'Code_Dos'=>$donne3,
		'Code_Fam'=>$donne4,'Seuil_Min'=>$donne5,'Code_For'=>$donne6
		));
	}
		
	return $E;
}

function Liste_article(){
	//selection de touts les types de articles
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM article,dosage,categorie,forme,famille where article.Code_Dos=dosage.Code_Dos and article.Code_Cat=categorie.Code_Cat and article.Code_For=forme.Code_For  and article.Code_Fam=famille.Code_Fam");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
function Liste_article_requette_cat($requette){
	//selection de touts les types de articles par categorie
   global $bd;
   $resul= array();
   $sql="SELECT distinct article.Code_Art as code, Lib_Dos , Lib_Art FROM article,dosage where ".$requette." and article.Code_Dos=dosage.Code_Dos group by article.Code_Art ";
   $req=$bd->query($sql);
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function article_categorie($donne1){
	//selection de touts les types de articles
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM article,dosage where article.Code_Dos=dosage.Code_Dos and Code_Cat=$donne1 order by Lib_Art asc");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_article($donne0,$donne1,$donne2,$donne3,$donne4,$donne5,$donne6,$donne7){
	global $bd;
	$req=$bd->query("SELECT * FROM article where Lib_Art='$donne1' and Code_Cat=$donne2 and Code_Dos=$donne3 and Code_Fam=$donne4 and Code_For=$donne6 and etat=$donne7");
	$E=-1;
	if($req->rowCount()==0)
	{		
	$modif=$bd->prepare('UPDATE article SET Lib_Art=:Lib_Art ,Code_Cat=:Code_Cat,Code_Dos=:Code_Dos,Code_Fam=:Code_Fam,Seuil_Min=:Seuil_Min,Code_For=:Code_For, etat=:etat WHERE Code_Art=:Code_Art');
     $modif->execute(array(
	 'Code_Art'=>$donne0,
	 'Lib_Art'=>$donne1,
	 'Code_Cat'=>$donne2,
	 'Code_Dos'=>$donne3,
	 'Code_Fam'=>$donne4,
	 'Seuil_Min'=>$donne5,
	 'Code_For'=>$donne6,
	 'etat'=>$donne7
	 ));
	 $E=1;
	}
	return $E;
} 

// page Fournisseur
function Enregistre_four($donne1,$donne2,$donne3,$donne4)
{	///Ajout utilisateur 
	global $bd;
	$E=-1;
	$req=$bd->query("SELECT * FROM fournisseur where Lib_Four='$donne1'");
	if($req->rowCount()==0){
		$sql= "INSERT INTO fournisseur(Lib_Four,Adresse,Tel,Email) Value(:Lib_Four,:Adresse,:Tel,:Email);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array(
		
			'Email'=>$donne4, 
			'Tel'=>$donne3,
	    	'Adresse'=>$donne2,
			'Lib_Four'=>$donne1
		));
		$E=1;
	}
	return $E;
		
	
}
function Liste_four(){ //selection de touts les Fournisseur 
	global $bd;
	$resul= array();
	$req=$bd->query("SELECT * FROM fournisseur where 1 order by Lib_Four asc ");
while ($row=$req->fetchObject()) {
		$resul[]=$row;
	}
return $resul;

}

function modification_Four($donne1,$donne2,$donne3,$donne4,$donne5){
	global $bd;
	$E=-1;
	$req=$bd->query("SELECT * FROM fournisseur where Lib_Four='$donne2' and Adresse='$donne3' and Tel='$donne4' and Email='$donne5'");
	if($req->rowCount()==0){
	
		$modif=$bd->prepare('UPDATE fournisseur SET Lib_Four=:Lib_Four,Adresse=:Adresse,Tel=:Tel,Email=:Email WHERE Code_Four=:Code_Four');
     $modif->execute(array(
		 'Email'=>$donne5,
		 'Tel'=>$donne4,
		 'Adresse'=>$donne3,
		 'Lib_Four'=>$donne2,
		 'Code_Four'=>$donne1
	 ));
	 $E=1;
	}
	
	return $E;
} 


////Gestion de la tables patient 

function Enregistre_patient ($donne0,$donne1,$donne2,$donne3,$donne4,$donne5,$donne6,$donne7,$donne8,$donne9)
{	///Ajout type de patient 
	global $bd;
///verification si le patient  existe deja
	$dateDepartTimestamp = strtotime(date('Y-01-01'));
    $dateFin= date('Y-m-d', strtotime('-'.$donne4.' Year', $dateDepartTimestamp ));
	$req=$bd->query("SELECT * FROM benificiaire  where Code_Beni='$donne1' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO benificiaire (Code_Beni,Nom_Beni, Prenom_Beni, Sexe_Beni, Date_Nai_Beni, Taille_Beni, Poids_Beni, Adresse, Tel, Email) Value ( :Code_Beni,:Nom_Beni, :Prenom_Beni, :Sexe_Beni, :Date_Nai_Beni, :Taille_Beni, :Poids_Beni, :Adresse, :Tel, :Email);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Code_Beni'=>$donne0, 
	    	'Nom_Beni'=>$donne1, 
	    	'Prenom_Beni'=>$donne2, 
	    	'Sexe_Beni'=>$donne3, 
	    	'Date_Nai_Beni'=>$dateFin, 
	    	'Taille_Beni'=>$donne6, 
	    	'Poids_Beni'=>$donne5, 
	    	'Adresse'=>$donne9, 
	    	'Tel'=>$donne7, 
	    	'Email'=>$donne8));
	}
		
	return $E;
}

function Liste_patient (){
	//selection de touts les types de patient s
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT benificiaire.Code_Beni as Code_Beni,Nom_Beni, Prenom_Beni, Sexe_Beni, Date_Nai_Beni, Taille_Beni, Poids_Beni, Adresse, Tel, Email, max(Date_Rdv)   Rdv FROM  benificiaire left join transfert_arv on benificiaire.Code_Beni=transfert_arv.Code_Beni where 1 group by benificiaire.Code_Beni  ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
// liste des patient  qui on un rdv a une date donné
function Liste_patient_rdv ($donne1){
	//selection de touts les types de patient s
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT benificiaire.Code_Beni as code,Nom_Beni, Prenom_Beni, Date_Rdv  FROM benificiaire left join transfert_arv on benificiaire.Code_Beni=transfert_arv.Code_Beni where Date_Rdv <=$donne1 or benificiaire.Code_Beni NOT IN (SELECT DISTINCT Code_Beni FROM transfert_arv as tfr); order by benificiaire.Code_Beni asc ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
// liste de sortie arv d'un patient
function liste_sortie_patient($donne1){
	//selection de touts les types de patient s
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT transfert_arv.Code_Arv as Code_Arv,Lib_Sit,Reg_Sit,Date_Arv, Date_Per, Date_Rdv, Nom_Pre_Per, sum(Quant) as nbr FROM site_per_arv, transfert_arv left join stock_tfr_arv  on transfert_arv.Code_Arv=stock_tfr_arv.Code_Arv where Code_Beni='$donne1' and site_per_arv.Code_Sit=transfert_arv.Code_Sit group by transfert_arv.Code_Arv  order by Date_Per asc");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}


function modification_patient ($donne0,$donne1,$donne2,$donne3,$donne4,$donne5,$donne6,$donne7,$donne8,$donne9){
	global $bd;
	$dateDepartTimestamp = strtotime(date('Y-01-01'));
    $dateFin= date('Y-m-d', strtotime('-'.$donne4.' Year', $dateDepartTimestamp ));
			
	$modif=$bd->prepare("UPDATE benificiaire  SET Nom_Beni=:Nom_Beni, Prenom_Beni=:Prenom_Beni, Sexe_Beni=:Sexe_Beni, Date_Nai_Beni=:Date_Nai_Beni, Taille_Beni=:Taille_Beni, Poids_Beni=:Poids_Beni, Adresse=:Adresse, Tel=:Tel, Email=:Email where Code_Beni=:Code_Beni");
     $modif->execute(array('Code_Beni'=>$donne0, 
	    	'Nom_Beni'=>$donne1, 
	    	'Prenom_Beni'=>$donne2, 
	    	'Sexe_Beni'=>$donne3, 
	    	'Date_Nai_Beni'=>$dateFin, 
	    	'Taille_Beni'=>$donne6, 
	    	'Poids_Beni'=>$donne5, 
	    	'Adresse'=>$donne9, 
	    	'Tel'=>$donne7, 
	    	'Email'=>$donne8));
	return 1;
} 

////Gestion de la tables sitearv
function Enregistre_sitearv($donne1,$donne2)
{	///Ajout type de sitearv
	global $bd;
///verification si le sitearv existe deja
	$req=$bd->query("SELECT * FROM site_per_arv where Lib_Sit='$donne1' and Reg_Sit='$donne2' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		$E=1;
		$sql= "INSERT INTO site_per_arv (Lib_Sit, Reg_Sit) Value(:Lib_Sit,:Reg_Sit);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Lib_Sit'=>$donne1,'Reg_Sit'=>$donne2
		));
	}
		
	return $E;
}

function Liste_sitearv(){
	//selection de touts les types de sitearvs
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM site_per_arv ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_sitearv($donne1,$donne2,$donne3){
	global $bd;
	$req=$bd->query("SELECT * FROM site_per_arv where Lib_Sit='$donne2' and Reg_Sit='$donne3' ");
	$E=-1;
	if($req->rowCount()==0)
	{	
		
	$modif=$bd->prepare('UPDATE site_per_arv SET Lib_Sit=:Lib_Sit, Reg_Sit=:Reg_Sit WHERE Code_Sit=:Code_Sit');
     $modif->execute(array('Code_Sit'=>$donne1,
		 'Lib_Sit'=>$donne2,
		 'Reg_Sit'=>$donne3
	 ));
	 $E=1;
	}
	return $E;
} 
////Gestion de la tables app
function Enregistre_app($donne1,$donne2,$donne3,$donne4,$donne5)
{	///Ajout type de app
	global $bd;
///verification si le app existe deja
		$sql= "INSERT INTO app (Id_user ,Code_Four, Ref_fac,Date_App,Lib_App) Value(:Id_user ,:Code_Four, :Ref_fac,:Date_App,:Lib_App);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Id_user'=>$donne1,
	    	'Code_Four'=>$donne2,
	    	'Ref_fac'=>$donne3,
	    	'Date_App'=>$donne4,
	    	'Lib_App'=>$donne5));

		$req=$bd->query("SELECT Max(Code_App) as Code_App  FROM app where 1 ");
	$resul=$req->fetch();
return $resul['Code_App'];
}


function Liste_app($donne1,$donne2){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT app.Code_App as Code_App,Ref_fac,Lib_Four,app.Lib_App as Lib_App,app.Code_Four as Code_Four,Date_App, Nom_user, count(ID) as nbr FROM app, fournisseur, utilisateur ,stock where app.Code_App=stock.Code_App and app.Code_Four=fournisseur.Code_Four and app.Id_user=utilisateur.Id_user and Date_App BETWEEN  '$donne1' and '$donne2' group by app.Code_App");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function Liste_prodduit_App($donne1){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT * FROM stock,article where Code_App=$donne1 and stock.Code_Art=article.Code_Art  ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}

function modification_app($donne1,$donne2,$donne3){
//
} 

//// Gestion des stock
function Modifie_stock_produit($donne1,$donne2){
	//selection de touts les types de patient s
   global $bd;
   $modif=$bd->prepare('UPDATE stock SET Quant=:Quant WHERE ID=:ID');
     $modif->execute(array('ID'=>$donne1,'Quant'=>$donne2 ));

}

function Liste_stoct_courant(){
	//selection de touts les types de articles
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT article.Code_Art as Code_Art,Seuil_Min, Lib_Dos,Lib_Art,Lib_For,Lib_Cat,Lib_Fam,sum(Quant) as nbr FROM article,dosage,categorie,forme,famille, stock where article.Code_Art=stock.Code_Art and etat=1 and Quant>0 and Date_Exp>CURRENT_DATE and article.Code_Dos=dosage.Code_Dos and article.Code_Cat=categorie.Code_Cat and article.Code_For=forme.Code_For and article.Code_Fam=famille.Code_Fam group by article.Code_Art");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
function Liste_stoct_perime(){
	//selection de touts les types de articles dont le stock est perimé
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT article.Code_Art as Code_Art,Seuil_Min, Lib_Dos,Lib_Art,Lib_For,Lib_Cat,Lib_Fam,sum(Quant) as nbr FROM article,dosage,categorie,forme,famille, stock where article.Code_Art=stock.Code_Art and etat=1 and Quant>0 and Date_Exp<CURRENT_DATE and article.Code_Dos=dosage.Code_Dos and article.Code_Cat=categorie.Code_Cat and article.Code_For=forme.Code_For and article.Code_Fam=famille.Code_Fam group by article.Code_Art");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}


function stock_produit($donne1){
	//selection de touts les types de patient s
   global $bd;
   $req=$bd->query("SELECT sum(Quant) as stk  FROM stock where Code_Art=$donne1 and Date_Exp > CURRENT_DATE ");
   $row=$req->fetch();
   if (isset($row['stk'])) 
   return $row['stk'];
	else
		return 0;

}
////
function stock_produit_date($donne1){
	//selection de touts les types de patient s
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT sum(Quant) as stk, ID, Date_Exp  FROM stock where Code_Art=$donne1 and Quant!=0 and Date_Exp > CURRENT_DATE group by ID order by Date_Exp  asc ");
   
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;
}
function Quantité_tfr_produit($donne1){
	//s
   global $bd;
   $resul=0;
   $req=$bd->query("SELECT sum(Quant_Tfr) as S FROM stock_Tfr where  ID=$donne1 ");
   
   $row=$req->fetch();
	   
	   if(isset($row['S']))
	   		$resul=$row['S'];
return $resul;
}

/// liste de service benificiaire d'un lots
function sotck_detail_service($donne1){
	//s
   global $bd;
   $resul=0;
   $resul= array();
   $req=$bd->query("SELECT Quant_Tfr, Lib_Ser,Date_Tfr  FROM transfert,Service,stock_Tfr where  ID=$donne1 and stock_tfr.Code_Tfr=transfert.Code_Tfr and transfert.Code_Ser=service.Code_Ser order by Date_Tfr asc; ");
   
  while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;
}
///

function Enregistre_stock($donne1,$donne2,$donne3,$donne4,$donne5)
{	///Ajout type de app
	global $bd;
///verification si le app existe deja	
		$sql= "INSERT INTO stock(Code_App ,Code_Art,Quant,Date_Exp,Lib_App) Value(:Code_App ,:Code_Art,:Quant,:Date_Exp,:Lib_App);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Code_App'=>$donne1,
	    	'Code_Art'=>$donne2,
	    	'Quant'=>$donne3,
	    	'Date_Exp'=>$donne4,
	    	'Lib_App'=>$donne5)
	);
}

function Modification_stock($donne1,$donne2,$donne3)
{	///Ajout type de app
	global $bd;
///verification si le app existe deja	
		$sql= "UPDATE stock SET Quant=:Quant,Date_Exp=:Date_Exp WHERE ID=:ID";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('ID'=>$donne1,
	    	'Quant'=>$donne2,
	    	'Date_Exp'=>$donne3)
	);
}

///

////Gestion de la tables transfere
function Enregistre_transfere($donne1,$donne2,$donne3)
{	///Ajout type de transfere
	global $bd;
///verification si le transfere existe deja
		$sql= "INSERT INTO transfert (Id_user ,Code_Ser, Date_Tfr) Value(:Id_user ,:Code_Ser, :Date_Tfr);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Id_user'=>$donne1,
	    	'Code_Ser'=>$donne2,
	    	'Date_Tfr'=>$donne3));

		$req=$bd->query("SELECT Max(Code_Tfr) as Code_transfert  FROM transfert where 1 ");
	$resul=$req->fetch();
return $resul['Code_transfert'];
}

function Liste_transfere($donne1,$donne2){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT transfert.Code_Tfr as Code_Tfr,Date_Tfr,Lib_Ser,transfert.Lib_Tfr as lib, Nom_user, Sum(Quant_Tfr) as nbr FROM transfert, Service, utilisateur,stock_tfr where transfert.Code_Tfr=stock_Tfr.Code_Tfr and transfert.Code_Ser=service.Code_Ser and transfert.Id_user=utilisateur.Id_user and Date_Tfr BETWEEN  '$donne1' and '$donne2' group by transfert.Code_Tfr");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
function Enregistre_prduit_transfere($donne1,$donne2,$donne3,$donne4)
{	///Ajout type de app
	global $bd;
///verification si le app existe deja	
		$sql= "INSERT INTO stock_tfr(ID,Code_Tfr,Quant_Tfr,QD) Value(:ID,:Code_Tfr ,:Quant_Tfr,:QD);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('ID'=>$donne1,'Code_Tfr'=>$donne2,
	    	'Quant_Tfr'=>$donne3,
	    	'QD'=>$donne4));
}
function Liste_prodduit_Tfr($donne1){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT Quant_Tfr,QD,Lib_Art FROM stock_tfr,stock,article where Code_Tfr=$donne1 and stock_tfr.ID=stock.ID and stock.Code_Art=article.Code_Art ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}


/////arv
////Gestion de la tables transfere
function Enregistre_transfere_Arv($donne1,$donne2,$donne3,$donne4,$donne5,$donne6,$donne7,$donne8)
{	///Ajout type de transfere
	global $bd;
///verification si le transfere existe deja
		$sql= "INSERT INTO transfert_arv (Code_Sit,Code_Beni,Id_user,Date_Arv,Date_Per,Date_Rdv,Nom_Pre_Per,Lib_Tfr)Value(:Code_Sit,:Code_Beni,:Id_user,:Date_Arv,:Date_Per,:Date_Rdv, :Nom_Pre_Per, :Lib_Tfr);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('Code_Sit'=>$donne1,'Code_Beni'=>$donne2,'Id_user'=>$donne3,'Date_Arv'=>$donne4,'Date_Per'=>$donne5,
	    	'Date_Rdv'=>$donne6,'Nom_Pre_Per'=>$donne7,'Lib_Tfr'=>$donne8));
		$req=$bd->query("SELECT Max(Code_Arv) as Code  FROM transfert_arv where 1 ");
	$resul=$req->fetch();
return $resul['Code'];
}
function Enregistre_prduit_transfere_arv($donne1,$donne2,$donne3,$donne4)
{	///Ajout type de app
	global $bd;
///verification si le app existe deja	
		$sql= "INSERT INTO stock_tfr_arv(ID,Code_Arv,Quant,QD) Value(:ID,:Code_Arv ,:Quant,:QD);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('ID'=>$donne1,'Code_Arv'=>$donne2,
	    	'Quant'=>$donne3,
	    	'QD'=>$donne4));
}
function Liste_transfere_arv($donne1,$donne2){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT transfert_arv.Code_Arv  as Code_Arv ,Date_Arv,Date_Per,Date_Rdv,Nom_Pre_Per,Lib_Sit,Nom_Beni,Prenom_Beni,benificiaire.Code_Beni as Code_Beni, Nom_user, Sum(Quant) as nbr FROM transfert_arv, site_per_arv, utilisateur,stock_tfr_arv,benificiaire where transfert_arv.Code_Arv =stock_Tfr_arv.Code_Arv  and transfert_arv.Code_Sit=site_per_arv.Code_Sit and transfert_arv.Id_user=utilisateur.Id_user and transfert_arv.Code_Beni=benificiaire.Code_Beni and Date_Arv BETWEEN  '$donne1' and '$donne2' group by transfert_arv.Code_Arv ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}
function Liste_prodduit_Tfr_Arv($donne1){
	//selection de touts les types de apps
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT stock_tfr_arv.Quant as Quant ,QD,Lib_Art FROM stock_tfr_arv,stock,article where Code_Arv=$donne1 and stock_tfr_arv.ID=stock.ID and stock.Code_Art=article.Code_Art ");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}






//
/*function Liste_transfere($donne1,$donne2){
	//selection de touts les types de transferes
   global $bd;
   $resul= array();
   $req=$bd->query("SELECT app.Code_App as Code_App,Ref_fac,Lib_Four,Date_App, Nom_user, count(ID) as nbr FROM app, fournisseur, utilisateur ,stock where app.Code_App=stock.Code_App and app.Code_Four=fournisseur.Code_Four and app.Id_user=utilisateur.Id_user and Date_App BETWEEN  '$donne1' and '$donne2' group by app.Code_App");
while ($row=$req->fetchObject()) {
	   $resul[]=$row;
   }
return $resul;

}*/







































/*

////fonctions  pour la tables clients
function info_client($donne){
/// prends en parametre le numero de telephone
	global $bd;

	$req=$bd->query("SELECT * FROM  client WHERE contcl='$donne'");
      $row=$req->fetch();
return $row;
}
function info_client2($donne){
///id du client
	global $bd;
	$req=$bd->query("SELECT * FROM  client WHERE id_cl=$donne");
      $row=$req->fetch();
return $row;
}
function Enregistre_client($donne1,$donne2,$donne3,$donne4)
{	global $bd;
		$sql= "INSERT INTO client(nomcl,prnomcl,contcl,adrcl) Value(:nomcl,:prnomcl,:contcl,:adrcl);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('nomcl'=>$donne1, 
	    	'prnomcl'=>$donne2,
	    'contcl'=>$donne3,
	'adrcl'=>$donne4));
     ///revoi l id du client enre....
	   $req=$bd->query("SELECT Max(id_cl) as id FROM  client");
      $row=$req->fetch();
return $row['id'];	
}
///Enregistre des numero d'abonne canal plus
function Enregistre_deco($donne1,$donne2)
{	global $bd;
		$sql= "INSERT INTO decodeur(id_cl,num_abo) Value(:id_cl,:num_abo);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('id_cl'=>$donne1, 
	    	'num_abo'=>$donne2));
}
 function list_deco_client($donne){ 

global $bd;
	$resul= array();
	$req=$bd->query("SELECT * FROM  decodeur WHERE id_cl=$donne");
while ($row=$req->fetchObject()) {
		$resul[]=$row;
	}
return $resul;
}
function list_client(){ 

global $bd;
	$resul= array();
	$req=$bd->query("SELECT * FROM client");
while ($row=$req->fetchObject()) {
		$resul[]=$row;
	}
return $resul;
}
//// activation d'abonnement

function Enregistre_abonnement($donne1,$donne2,$donne4,$donne5,$donne3)
{	global $bd;
		$sql= "INSERT INTO abonnement(date_abo, heur_abo, etat, id_of, id_deco,nbrM) Value(:date_abo, :heur_abo, :etat, :id_of, :id_deco,:nbrM);";
	    $Entrer=$bd->prepare($sql);
	    $Entrer->execute(array('date_abo'=>$donne1, 
	    	'heur_abo'=>$donne2,
	    	'etat'=>1,
	    	'id_of'=>$donne4,
	    	'id_deco'=>$donne5,
	    	'nbrM'=>$donne3));

	  $req=$bd->query("SELECT Max(id_abo) as id FROM  abonnement");
      $row=$req->fetch();
	return $row['id'];	
}

///requet sur les abonnement
function info_abonement($donne){
///id du client
	global $bd;
	$req=$bd->query("SELECT * FROM  abonnement,decodeur,client,offre 
		WHERE id_abo=$donne and abonnement.id_of=offre.id_of and abonnement.id_deco=decodeur.id_deco and decodeur.id_cl=client.id_cl");
      $row=$req->fetch();
return $row;
}
function Fbonnement(){ 

global $bd;
	$resul= array();
	$req=$bd->query("SELECT * FROM  abonnement,decodeur,client,offre 
		WHERE abonnement.id_of=offre.id_of and abonnement.id_deco=decodeur.id_deco and decodeur.id_cl=client.id_cl");
while ($row=$req->fetchObject()) {
		$resul[]=$row;
	}
return $resul;
}
///fonction autre
function date_fr($d1){
	///date en format jj/M/A
	return(implode('/', array_reverse(oode('-',$d1))));
 }



/// format d'ecriture d'une numero d'abonné

function munero_abo($donne){
	$i=0;
	while ($i<=14 and isset($donne[$i])) {
		if (($i+1)%3==0) {
			echo $donne[$i]."  ";# code...
		}else {
			echo $donne[$i];
		}
		$i++;
	}
}
function dateEchance($donne1,$donne2){
	
		
		$dateDepartTimestamp = strtotime($donne1);
		$dateFin= date('Y-m-d', strtotime('+'.$donne2.' month', $dateDepartTimestamp ));

return $dateFin;

}
function dateEchance2($donne1,$donne2){
	
		
		$dateDepartTimestamp = strtotime($donne1);
		$dateFin= date('Y-m-d', strtotime('-'.$donne2.'day', $dateDepartTimestamp ));

return $dateFin;

}
function format($vddd)
	{
		$l=strlen($vddd)-1;
		$pace=" ";
		$f='';
		for ($i=0; $i <=$l ; $i++) { 
			# code...
			$f=$f.$vddd[$i];
			if(($i+1)%3==0 )
				$f=$f.$pace;
		}
	return $f;
	}
function Nombre_abo_aterme($donne1){
	global $bd;
	$sql="SELECT * FROM abonnement WHERE date_abo='$donne1'";
	$requet=$bd->query($sql);
	$nbr=$requet->rowcount($sql);
	return $nbr;}*/
 ?>
