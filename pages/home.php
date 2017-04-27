


<h1 style="margin-left: 60px;">POSTEZ VOS IDEES</h1>


	<section>

		<div id="articles">









<?php

$pdo = new PDO('mysql:dbname=BigBlog;host=localhost','root', 'flingualelas&');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req=$pdo->query('SELECT titre, contenu, auteur, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY date_creation DESC LIMIT 0, 5');


while ($donnees=$req->fetch()){
	echo '<div class="art">
							<div class="gauche">
								<p class="date">'.$donnees['date_fr'].'</p>
								<p class="comment"><a href=?"p=commenter">Commenter</a></p>
							</div>

							<div class="droite">
									<h3>'.$donnees['titre'].'</h3>
									<p class="contenu">'.$donnees['contenu'].'</p>
									<p class="par"><em>'.$donnees['auteur'].'</em></p>
							</div>
				</div>';
}

$req->closeCursor();
?>
					

<div style="display: inline-block; width: 120px;z-index:4; position:absolute; top:-125px;left:850px"><a href="?deconnexion=oui">Déconnexion</a></div>
					<div class="art">



					

					<?php


//Déconnexion avec session destroy
	if (isset($_GET['deconnexion']) && $_GET['deconnexion']=='oui'){
			session_destroy();
			header('Location:index.php?p=home');
	}
//
?>
<div id="film" style="position: fixed; top: 50px;left:550px;background-color: silver; opacity:0.8; z-index: 2;width:550px; height: 438px;">
<video style="position:absolute;left: 0px" width="797px" src="../pages/images/True Detective.mp4" autoplay loop></video>
</div>
	
							<div class="gauche">
								<p class="date">23 Avril 2017</p>
								<p class="comment"><a href="?p=commenter">Commenter</a></p>
							</div>

							<div class="droite">
									<h2>Titre</h2>
									<p class="par">Par : Auteur</p>
							</div>
				</div>

				<div class="art">
							<div class="gauche">
								<p class="date">23 Avril 2017</p>
								<p class="comment"><a href="?p=commenter">Commenter</a></p>
							</div>

							<div class="droite">
									<h2>Titre</h2>
									<p class="par">Par : Auteur</p>
							</div>
				</div>

				<div class="art">
							<div class="gauche">
								<p class="date">23 Avril 2017</p>
								<p class="comment"><a href="?p=commenter">Commenter</a></p>
							</div>

							<div class="droite">
									<h2>Titre</h2>
									<p class="par">Par : Auteur</p>
							</div>
				</div>
			

connexion


		</div>

<?php
if (!isset($_SESSION['pseudo'])){
?>
		<aside id="connexion">
				<form method="post" action="#">
				<p style="color: white;" class="intitule">Connexion</p>
				<input type="email" id="mail" name="mail" placeholder="Votre adresse mail : " required><br>
				<input type="password" id="password" name="password" placeholder="Votre mot de passe :">
				<br>
				<?php
//récupération des variables password et mail

$pass=htmlspecialchars($_POST['password']);
$mail=htmlspecialchars($_POST['mail']);


//connexion à la table membres
$pdo=new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');

$req=$pdo->prepare('SELECT * FROM membres WHERE mail = :mail AND password = :password');

$req->execute(array(
'mail'=>$mail,
'password'=>$pass
	));

$donnees=$req->fetch();

if($donnees){
	$_SESSION['pseudo']=$donnees['pseudo'];

	echo '<div id="bienvenue" style="display:inline-block; padding:7px;border-radius:5px;position:absolute;left: -356px; top: -30px; color:white;background-color:black;font-size: 1.6em;font-weight:bold;">Bienvenue , '.$_SESSION['pseudo'].' !</div>';
}else{
	echo '<span style="color:red;">Informations incorrectes</span>';
}

?>
				<a href="index.php?p=home&connexion=oui"><input type="submit" id="submit" value="Envoyer"></a>
				</form>
		</aside>
<?php
}
?>




<?php
if(!isset($_SESSION['pseudo'])){
?>

		<aside id="inscr" style="background-color: rgb(39,40,45);">
		    <a href="?p=inscription"><p style="color: white;" class="intitule">Inscription</p></a>
		</aside>

<?php
}
?>

	</section>



<a href="?p=ajouter"><p>Lien vers la single</p></a>


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
	$(function(){
		$('#bienvenue').delay(1000).hide('explode');
	});

</script>