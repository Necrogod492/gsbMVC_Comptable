    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Comptable :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom'] ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerVisiteur" title="Validation fiche de frais ">Valider frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=suivreFrais&action=selectionnerVisiteur" title="Suivis des fiches de frais">Suivre paiement frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    