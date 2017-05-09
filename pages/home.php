<h1 id="toutes" style="font-family: 'Helvetica neue'; font-size: 1.3em;display: inline-block;margin-left: 60px; position: relative; top: -17px; background-color: rgb(39,40,45);color: white; padding-top: 5px; padding-bottom: 5px; padding-left: 21px; padding-right:21px;border-radius: 5px;">Toutes les idées</h1>


<h1 id="serie" style="z-index: 50;background-color: white;border-radius: 5px;padding-top: 5px; padding-bottom: 5px; padding-left: 11px; padding-right: 11px;color: rgb(48, 48, 44); position:absolute;top: 40px;left: 395px;border-left: 3px solid black;">La 1ère série collaborative</h1>

	<section>

		<div id="articles">

<?php

//  READ des articles


foreach($db->query('SELECT titre, contenu, auteur, DATE_FORMAT(date_creation, \'le %d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY date_creation DESC') as $donnees){


	echo '<hr><div class="art">
							<div class="gauche">
								<p style="position: relative; right: 10px;" class="date">'.$donnees['date_fr'].'</p>
								<p class="comment"><a href=?"p=commenter">Commenter</a></p>
							</div>

							<div class="droite">
									<h3 style="text-decoration:underline;position: relative; right: -30px; bottom: 0px;">'.$donnees['titre'].'</h3>
									<br><p style="font-size: 0.8em;position:relative; right: 50px;" class="contenu">'.$donnees['contenu'].'</p>
									<p style="position: relative; left: 60px; font-weight: bold;" class="par"><em>'.$donnees['auteur'].'</em></p>
							</div>
				</div>';

}


//DECONNEXION

?>
<div style="display: inline-block; width: 120px;z-index:4; position:absolute; top:-125px;left:850px"><a href="?deconnexion=oui">Déconnexion</a></div>
					<div class="art">
					<?php
	if (isset($_GET['deconnexion']) && $_GET['deconnexion']=='oui'){
			session_destroy();
			header('Location:index.php?p=home');
	}
//

	// VIDEO
?>

<div id="film" style="position: fixed; top: 50px;left:550px;background-color: silver; opacity:0.8; z-index: 2;width:550px; height: 440px;">
	<video style="position:absolute;left: 0px;border-left:2px solid black;" width="799px" src="../pages/images/True Detective.mp4" autoplay loop></video>
</div>
	
				</div>

				

				
			



		</div>

<?php

//Connexion
if (!isset($_SESSION['pseudo'])){
?>
		<aside id="connexion" style="padding-top: 3px;">
				<form method="post" action="#">
				<p style="color: white;" class="intitule">Connexion</p>
				<input type="email" id="mail" name="mail" placeholder="Votre adresse mail : " required><br>
				<input style="position: relative;top : 7px;" type="password" id="password" name="password" placeholder="Votre mot de passe :">
				<br>
				<?php
//récupération des variables password et mail

$pass=htmlspecialchars($_POST['password']);
$mail=htmlspecialchars($_POST['mail']);


//connexion à la table membres


foreach( $db->execute('SELECT * FROM membres WHERE mail = :mail AND password = :password', array(
'mail'=>$mail,
'password'=>$pass
 )) as $donnees){





if($donnees){
	$_SESSION['pseudo']=$donnees['pseudo'];

	echo '<div id="bienvenue" style="display:inline-block; padding:7px;border-radius:5px;position:absolute;left: -356px; top: -5px; color:white;background-color:black;font-size: 1.6em;font-weight:bold; box-shadow: 2px 2px 1px black;">Bienvenue , '.$_SESSION['pseudo'].' !</div>';
}else{
	echo '<span style="color:red; position: relative; top: 8px;">Informations incorrectes</span>';
}


}

?>
				<a href="index.php?p=home&connexion=oui"><input style="background-color: black; color: white;border: 2px solid black; border-radius: 5px; padding-right: 7px; padding-left: 7px;margin-top: 10px;" type="submit" id="submit" value="Envoyer"></a>
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

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>


	$(function(){
		$('#bienvenue').delay(2000).hide('1000');
	});

$('#toutes').hover(function(){
$('#toutes').text('Toutes vos idées').text('Toutes vos idées');
})

</script>