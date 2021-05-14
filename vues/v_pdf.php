<?php
function creerPdf($lesFraisForfait, $lesFraisHorsForfait, $numAnnee, $numMois, $libEtat, $montantValide, $nbJustificatifs, $dateModif,$comptable,$visiteur){
    
    // permet d'inclure la bibliothèque fpdf
    require('fpdf/fpdf.php');
    
    // instancie un objet de type FPDF qui permet de créer le PDF
    $pdf=new FPDF();
    // ajoute une page
    $pdf->AddPage();
    $pdf->Image('images/logo.jpg',8,2,80);
    $pdf->SetFont('Helvetica','',11);
    $pdf->SetTextColor(0);
    
    // Infos de la commande calées à gauche
    $pdf->Text(18,68,'Numero Fiche : C1586B');
    $pdf->Text(18,73,'Date : '. date('d/m/Y')); // date du jour
    $pdf->Text(18,78,'Gere par : '.$comptable); // nom du comptable
    
    // Infos du client calées à droite
    $pdf->Text(150,68,utf8_decode($visiteur['nom']).' '.utf8_decode($visiteur['prenom']));
    $pdf->Text(150,73,utf8_decode($visiteur['adresse']));
    $pdf->Text(150,78,$visiteur['cp'].' '.utf8_decode($visiteur['ville']));
    
    //Intitulé 1
    $pdf->Text(18,88,'Fiche frais du mois : '.$numMois.'-'.$numAnnee);
    $pdf->Text(18,93,'Etat : '.utf8_decode($libEtat).' depuis le '.$dateModif);
    $pdf->Text(18,103,'Element forfaitise : ');
      
    // Tableau 1
    $pdf->SetDrawColor(183); // Couleur du fond
    $pdf->SetFillColor(221); // Couleur des filets
    $pdf->SetTextColor(0); // Couleur du texte
    $pdf->SetY(108);
    $pdf->SetX(8);
    foreach ( $lesFraisForfait as $unFraisForfait )
    {
       
        $pdf->Cell(50,8,utf8_decode($unFraisForfait['libelle']),1,0,'L',1);
    }
    $pdf->SetY(116); // 108 + 8
    $pdf->SetX(8);
    foreach ($lesFraisForfait as $unFraisForfait) {
        
        $pdf->Cell(50,8,utf8_decode($unFraisForfait['quantite']),1,'C');      
    }
    
    //Intitulé 2
    $pdf->Text(18,132,'Descriptif des element hors forfait - '.$nbJustificatifs.' justificatifs recus -');
    
    // Tableau 2 
    $pdf->SetDrawColor(183); // Couleur du fond
    $pdf->SetFillColor(221); // Couleur des filets
    $pdf->SetTextColor(0); // Couleur du texte
    $pdf->SetY(137);
    $pdf->SetX(8); // 8mm de la colonne de gauche
    $pdf->Cell(50,8,'Date',1,0,'C',1);
    $pdf->SetX(58); // 8 + 50
    $pdf->Cell(80,8,'Libelle',1,0,'C',1);
    $pdf->SetX(138); // 58 + 80 !!
    $pdf->Cell(50,8,'Montant',1,0,'C',1);
    $position = 145 ;
    foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
    {
        $pdf->SetY($position);
        $pdf->SetX(8);
        $pdf->MultiCell(50,8,utf8_decode($unFraisHorsForfait['date']),1,'C');
        $pdf->SetY($position);
        $pdf->SetX(58); 
        $pdf->MultiCell(80,8,utf8_decode($unFraisHorsForfait['libelle']),1,'C');
        $pdf->SetY($position);
        $pdf->SetX(138); 
        $pdf->MultiCell(50,8,utf8_decode($unFraisHorsForfait['montant']),1,'C');
        $position += 8; // incrementation pour que ca colle de 8mm
    }
    
    // Tableau 3 
    $pdf->SetDrawColor(183); // Couleur du fond
    $pdf->SetFillColor(221); // Couleur des filets
    $pdf->SetTextColor(0); // Couleur du texte
    $pdf->SetY($position + 10);
    $pdf->SetX(8);
    $pdf->Cell(50,8,"Montant total : ".$montantValide,1,0,'C',1);
    
    
    $pdf->Ln(); // Retour à la ligne
    
    // Nom du fichier
    $nom = 'Fiche_Frais_'.$visiteur['nom'].'_'.$visiteur['prenom'].'pdf';
    
    ob_end_clean() ;
    
    $pdf->Output($nom, 'I');
    
    
}