<?php
function Id($d,$donne){
	if(  strlen($donne)==1)
		return $d."000".$donne;
	elseif (strlen($donne)==2) {
		return $d."00".$donne;
	}elseif (strlen($donne)==3) {
		return $d."0".$donne;
	}else{
		return $d.$donne;
	}
}

function date_fr($d1){
	///date en format jj/M/A
	return(implode('/', array_reverse(explode('-',$d1))));
 }
///fonction pour faire un retoure en arrier de date
function dateAvant($donne1,$donne2){
	
		
		$dateDepartTimestamp = strtotime($donne1);
		$dateFin= date('Y-m-d', strtotime('-'.$donne2.' month', $dateDepartTimestamp ));

return $dateFin;

}

function formatfrench($phoneN,$inter=false){
	   $phoneN=preg_replace('/[^0-9]+/', '',$phoneN);
	   $phoneN=substr($phoneN,-9);
	   $motif=$inter ? '+227 \1 \2 \3 \4 \5':'0\1 \2 \3 \4 \5  ';
	   $phoneN=preg_replace('/(\d{2})(\d{2})(\d{2})(\d{2})/', $motif,$phoneN);
	   return $phoneN;
   }

?>