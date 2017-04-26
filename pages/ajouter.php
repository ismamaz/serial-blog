


  <div id="liste" style="width:600px;background-color:silver;border: 2px solid black;border-radius: 2px;">
<h2>Vos articles : </h2>
<?php


// connexion a la base de données
$pdo = new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');

// récupération des articles du membre
$req=$pdo->prepare('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles WHERE auteur = :auteur');
$req->execute(array(
'auteur'=>$_SESSION['pseudo']
  ));

while ($donnees = $req->fetch()){
echo '<h4 style="font-style:italic">'.$donnees['date_fr'].'</h4><h2>'. $donnees['titre'] . '</h2><p style="margin-left:100px;">' . $donnees['contenu'].'</p>
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



?>

  </div>

<h2>Ajouter un article</h2>
  <form>
     <label for="titre">Le titre : </label><input type="text" id="titre" name="titre"><br>

     <?php
     if (isset($_SESSION['pseudo'])){
  echo '<span>bienvenue, '.$_SESSION['pseudo'].'!</span>';
}
?>
     <textarea id="contenu" cols="80" rows="9"></textarea><br>
     <button id="Envoyer">Envoyer</button>
     <?php
      echo $_SESSION['pseudo']; 
      ?>
  </form>



<a href="?p=home">Retour à l'accueil</a>