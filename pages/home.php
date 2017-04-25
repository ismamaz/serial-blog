


<h1 style="margin-left: 60px;">ARTICLES RECENTS</h1>


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
									<h2>'.$donnees['titre'].'</h2>
									<p class="contenu">'.$donnees['contenu'].'</p>
									<p class="par"><em>'.$donnees['auteur'].'</em></p>
							</div>
				</div>';
}

$req->closeCursor();
?>
					


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
			




		</div>


		<aside>
				<form method="post" action="#">
				<p class="intitule">Connexion</p>
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

	echo 'Bienvenue , '.$_SESSION['pseudo'].'!';



}else{
	echo '<span style="color:red;">Informations incorrectes</span>';
}

?>
				<input type="submit" id="submit" value="Envoyer">
				</form>
		</aside>





		<aside id="inscr">
		    <a href="?p=inscription"><p class="intitule">Inscription</p></a>
		</aside>

	</section>




<a href="?p=ajouter"><p>Lien vers la single</p></a>

