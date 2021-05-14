
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
    <div class ="container">
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th><?php echo $libelle?></th>
		 <?php
        }
		?>
		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td><?php echo $quantite?></td>
		 <?php
          }
		?>
		<td><a href="index.php?uc=etatFrais&action=actualiser" role="button">Actualiser</a></td>
		</tr>
		
    </table></div>
    <center>
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>  
                <th class='refuser' colspan="2" >Refuser frais hors forfait</th>         
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
		?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><a class="btn btn-primary" href="index.php?uc=etatFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" role="button" 
                				onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer</a></td>
             	<td><a class="btn btn-primary" href="index.php?uc=etatFrais&action=reporterFraisHorsForfait" role="button">Reporter</a></td>
             </tr>
        <?php 
          }
		?>
    </table>
        <a href="index.php?uc=etatFrais&action=validerFrais" role="bouton" size="20" /> Valider</a></center>
     
  </div>
 













