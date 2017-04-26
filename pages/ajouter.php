<h2>Ajouter un article</h2>


  <form>
     <label for="titre">Le titre : </label><input type="text" id="titre" name="titre"><br>

     <?php
     if (isset($_SESSION['pseudo'])){
  echo '<span>bienvenue</span>';
}
?>
     <textarea id="contenu" cols="80" rows="9"></textarea><br>
     <button id="Envoyer">Envoyer</button>
     <?php
      echo $_SESSION['pseudo']; 
      ?>
  </form>

<a href="?p=home">Retour à l'accueil</a>