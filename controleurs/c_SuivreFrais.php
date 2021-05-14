<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['idComptable'];
switch($action){
    case 'selectionnerVisiteur' :{
    $lesVisiteurs = $pdo-> getLesVisiteurs($idComptable);
    $lesCles = array_keys($lesVisiteurs);
    $visiteurASelectionner = $lesCles[0];
    include("vues/v_choixVisiteur.php");
    break;
}
    case 'selectionnerFiche' :{
        $leVisiteur = $_REQUEST['lstVisiteur'];
        $_SESSION['idVisiteur'] = $leVisiteur;
        $lesFiches = $pdo -> getLesFicheFrais($leVisiteur);
        if ($lesFiches != null) {
        include("vues/v_validerFrais.php"); 
        } else { 
            include ("vues/v_erreurs.php");
        }
    }
    case 'pdf' :{
       $idVisiteur = $_SESSION['idVisiteur'];
       $comptable = $_SESSION['nom']." ".$_SESSION['prenom'];
       $visiteur = $pdo-> getInfosVisiteur($idVisiteur);
       $leMois = $_GET['mois'];
       $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
       $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
       $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
       $numAnnee =substr( $leMois,0,4);
       $numMois =substr( $leMois,4,2);
       $libEtat = $lesInfosFicheFrais['libEtat'];
       $montantValide = $lesInfosFicheFrais['montantValide'];
       $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
       $dateModif =  $lesInfosFicheFrais['dateModif'];
       $dateModif =  dateAnglaisVersFrancais($dateModif);
       include ('vues/v_pdf.php');
       creerPdf($lesFraisForfait, $lesFraisHorsForfait, $numAnnee, $numMois, $libEtat, $montantValide, $nbJustificatifs, $dateModif,$comptable,$visiteur);
    }
    
    case 'rembourser' :{
        $idVisiteur = $_SESSION['idVisiteur'];
        $leMois = $_GET['mois'];
        $pdo-> remboursement($idVisiteur, $leMois);
        include ('vues/v_confirmRB.php');
    }
}

?>