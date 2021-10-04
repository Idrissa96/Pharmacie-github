<?php
function modification_app($donne1,$donne2,$donne3,$donne4,$donne5){
	global $bd;
	$modif=$bd->prepare('UPDATE app SET Code_Four=:Code_Four, Ref_fac=:Ref_fac,Date_App=:Date_App,Lib_App=:Lib_App WHERE Code_App=:Code_App');
     $modif->execute(array('Code_App'=>$donne1,
	    	'Code_Four'=>$donne2,
	    	'Ref_fac'=>$donne3,
	    	'Date_App'=>$donne4,
	    	'Lib_App'=>$donne5));
} 
function supprimer_formul($donne1){
	global $bd;
	//$reM=$bd->query("DELETE FROM offre where id_of=$donne1");
}

?>