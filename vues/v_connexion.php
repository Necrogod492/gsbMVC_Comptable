<div id="contenu">
      <h2>Identification comptable</h2>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
   
    
    <p>
        <label for="nom">Login*</label>
        <input id="login" type="text" name="login"  size="30" maxlength="45">
    </p>
    <p>
        <label for="mdp">Mot de passe*</label>
        <input id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
    </p>
    
    <label class="btn btn-secondary active">
        <input type="radio" name="options" value="comptable" checked> Comptable
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" value="visiteur"> Visiteur
    </label>
    
    <br><br>
    
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
 
</form>

</div>