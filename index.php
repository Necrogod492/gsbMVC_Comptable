<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'etatFrais' :{
		include("controleurs/c_validerFrais.php");break; 
	}
	case 'suivreFrais' :{
	    include("controleurs/c_SuivreFrais.php");break;
	}
}
include("vues/v_pied.php") ;
?>