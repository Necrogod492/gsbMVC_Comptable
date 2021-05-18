<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                $options= $_REQUEST['options'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		$comptable = $pdo->getInfosComptable($login,$mdp);
		if ($options=="visiteur") {
		if(is_array( $visiteur)){
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
			include("vues/v_sommaire.php");
		
                    }
                    else {
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
                    }
                }
		if ($options=="comptable") {
		if(is_array( $comptable)){
			$id = $comptable['id'];
			$nom =  $comptable['nom'];
			$prenom = $comptable['prenom'];
			connecter($id,$nom,$prenom);
			include("vues/v_sommaire.php");
		}
		
		else {
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
                    }
                }
		
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>