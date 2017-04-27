
<div id="liste" style="position:absolute;left: 583px;padding-left: 40px;top:290px;width:535px;background-color:black;color: white;border: 1px solid black;">
<h3 style="margin-left: 11px;font-size: 1.3em;padding-left: 26px; padding-right: 26px; padding-top: 5px;padding-bottom: 5px;border-radius: 5px;color:black;background-color:white;display: inline-block;"><?php  echo $_SESSION['pseudo']; ?> Vos articles </h3>



<?php


// connexion a la base de données
$pdo = new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');

// FONCTIONNALITE : READ récupération des articles du membre

$req=$pdo->prepare('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles WHERE auteur = :auteur ORDER BY date_creation DESC ');
$req->execute(array(
'auteur'=>$_SESSION['pseudo']
  ));

while ($donnees = $req->fetch()){
echo '<br><hr><br><h5 style="font-style:italic">'.$donnees['date_fr'].'</h5><h3 style="margin-left: 20px;margin-top:-10px;">'. $donnees['titre'] . '</h3><p style="margin-left:100px;">' . $donnees['contenu'].'</p>
<a href=index.php?p=ajouter&id_update='.$donnees['id'].'>Modifier</a><br>
<a href=index.php?p=ajouter&id_delete='.$donnees['id'].'>Supprimer</a>';
}

$req->closeCursor();



//Pour UPDATE l'article---------------------

// if (isset($_GET['id_update']){
    // $id_update = htmlspecialchars($_GET['id_update']);
    // echo '<textarea name="newContenu"></textarea>';
  

// if( isset($_POST['newContenu'])){
//   $newContenu=htmlspecialchars($_POST['newContenu'])
// }

      //connexion à la database

//     $bdd= new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');
// $req= $bdd->prepare('UPDATE articles SET contenu = :newContenu WHERE id = :id');
// $req->execute(array(
// 'id'=> $id_update,
// 'newContenu' => $newContenu
//   ));
// }
//__________________________________________________


//POur DELETE l'article ----------------------------

if (isset($_GET['id_delete'])){

  $id_delete = htmlspecialchars($_GET['id_delete']);
 

  $bdd= new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');
  $req= $bdd->prepare('DELETE FROM articles WHERE id = :id');
  $req->execute(array(
  'id'=> $id_delete
  ));
}


$req->closeCursor();
?>


<div style="z-index:4;position:absolute; top:-300px; left: -410px;" id="bienvenuta">
 <?php
      echo 'Votre espace personnel, '.$_SESSION['pseudo']; 
      ?>
</div>
  </div>
<div id="ajout" style="position:absolute;top:50px;left: 580px;padding-left: 10px; width: 535px;height: 420px;">
<h3 style="font-size: 1.3em; color:white; background-color: black;display: inline-block;padding: 11px;padding-top: 5px;padding-bottom: 5px;padding-left: 27px;padding-right: 27px;border-radius: 5px;position: relative; left: -230px;top: 44px;z-index: 50;opacity: 0.6;">Ajouter une idée</h3>
  <form method="POST" action="#">
     <label style="margin-bottom:4px;" for="titre">Le titre : </label><input type="text" id="titre" name="titre" required><br>

<!--      <?php
//      if (isset($_SESSION['pseudo'])){
//   echo '<span>bienvenue, '.$_SESSION['pseudo'].'!</span>';
// }
?> -->
     <textarea id="contenu" name="contenu" style="margin-top:8px;border: 1px solid black;border-radius: 5px;" cols="65" rows="4" placeholder="Votre nouvelle idée de génie" required></textarea><br>



     <?php


        if (isset($_SESSION['pseudo'])){
     ?>
     <button style="margin-top:5px;background-color: black;color:white; border: 2px solid black; border-radius: 5px;margin-left: 425px;" id="Envoyer">Envoyer</button>
    
     <?php
      }else{
        ?>
       <a href="index.php?p=home" style="font-size: 1.1em; margin-top:8px;background-color: black;color:white; border: 2px solid black; border-radius: 5px;margin-left: 425px;padding-top: 2px; padding-bottom: 2px; padding-left: 1px; padding-right: 1px;position: relative;right: 47px;top: 5px;">Connectez-vous</a>

      <?php
             }
      ?>


  </form>

  <?php


// Fonctionnalité : Ajouter un article

// Assignation des variables

  if (isset($_POST['titre'])){
    $titre = htmlspecialchars($_POST['titre']);
  }

 if (isset($_POST['contenu'])){
    $contenu = htmlspecialchars($_POST['contenu']);
  }



  //Connexion à la base de données

  $pdo=new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');

  // Insertion de l'article dans la table articles

  $req=$pdo->prepare('INSERT INTO articles (titre, contenu, auteur) VALUES (:titre, :contenu, :auteur)');
  $req->execute(array(
    'titre'=> $titre,
    'contenu'=> $contenu,
    'auteur' => $_SESSION['pseudo']
  ));
  
echo '<h1 style="position: absolute; left: -570px;top: 86px; display: inline-block; z-index: 20;width: 558px; height: 80px; color: white; background-color:black; border-radius: 5px; padding-top: 27px; padding-bottom: 20px; padding-right: 60px; padding-left:110px;" id="bienAjouté">Votre article a bien été ajouté</h1>';

$req->closeCursor();
  ?>
</div>




<div id="film" style="position: fixed; top: 43px;left:0px;background-color: black; opacity:0.8; z-index: 2;width:560px; height: 445px;">
<video style="position:absolute;left: 0px;width: 583px; height: 451px;border-right:2px solid black; " src="../pages/images/The Wire.mp4" autoplay loop></video>
</div>


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
<script>

$(function(){
  $('#bienAjouté').delay(1000).fadeOut('explode');
});
</script>