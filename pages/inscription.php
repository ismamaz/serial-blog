
<div id="inscrit">
	<h3 style="position:relative;left: 400px; display: inline-block; background-color: black; color:white; padding-top: 5px; padding-bottom: 5px; padding-left: 18px; padding-right: 18px; border-radius: 5px;">Inscription</h3>

		<form id="inscritForm" style="margin-top: 40px; position: relative; left: 276px; display:none;" method="post" action="#">

			<label for="pseudo">Choisissez votre pseudo : </label><input type="text" name="pseudo" id="pseudo" placeholder="entre 3 et 10 caractères" required="" autocomplete><br>
			<label for="mail1">Votre adresse mail : </label><input type="email" name="mail1" id="mail1" placeholder="ex : asterix@gmail.fr" required autocomplete><br>
			<label for="password">Choisissez votre mot de passe : </label><input type="password" name="password" id="password" placeholder="entre 4 et 8 caractères" required><br>
			<br><input type="submit" id="btn" value="Envoyer" onclick="checker()"> 
			<input type="reset" style="margin-left: 246px;" value="Reset" id="reset">
	</form>
	
	<img id="im1" class="hov" src="../pages/images/thewire3.jpg" style="position:absolute; left:1px;top: 52px; z-index: 4;" alt="the_wire" width="310px" height="222px">
	<img class="hov" src="../pages/images/soprano4.jpg" style="position:absolute; left:2px;top: 275px;" alt="the_wire" width="310px" height="222px">
	<img class="hov" src="../pages/images/soprano5.jpg" style="position:absolute; right:1px;top: 52px;" alt="the_wire" width="310px" height="222px">
	<img class="hov" src="../pages/images/detective2.jpg" style="position:absolute; right:2px;top: 275px;" alt="the_wire" width="310px" height="222px">
	


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script>





$('.hov').hover(function(){
	$(this).fadeTo(1000,0.2).fadeTo(1000, 1);
})
	</script>
	
<?php


//Récupération des infos dans les variables pseudo ,mail et password
if (isset($_POST['pseudo'])){
	$pseudo=htmlspecialchars($_POST['pseudo']);
}


if (isset($_POST['mail1'])){
	$mail=htmlspecialchars($_POST['mail1']);
}
if (isset($_POST['password'])){
	$pass=htmlspecialchars($_POST['password']);
}


	
//Liaison à la base de données BigBlog
	
	$bdd= new PDO('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas&');


// Vérification de la disponiblité du pseudo 

$res=$bdd->prepare("SELECT id FROM membres WHERE pseudo=:pseudo");
$res->execute(array(
	'pseudo'=>$pseudo
	));
$donnees=$res->fetch();
$dispos=0;

if($donnees){
	echo '<br><span style="color:red;margin-top:8px;margin-left:200px;position: relative; left: 110px;top: 200px;">Ce pseudo est déja pris!</span>';
}else{
$dispos+=1;
}

$res->closeCursor();



// Vérification de la disponiblité du mail 

$res=$bdd->prepare("SELECT id FROM membres WHERE mail = :mail");
$res->execute(array(
'mail'=>$mail
	));
$donnees= $res->fetch();
if ($donnees){
	echo ' <br><span style="color:red;margin-top:8px;margin-left:200px;position: relative; right: 80px;">Cette adresse mail est déja inscrite!</span>';
}else{
	$dispos+=1;
}






//Inscription du nouveau membre dans la table si on a les 2 dispos


if($dispos==2){


	$req=$bdd->prepare('INSERT INTO membres (pseudo, mail, password) VALUES (:pseudo, :mail, :password)');

	$donnees=$req->execute(array(
		'pseudo'=>$pseudo,
		'mail'=>$mail,
		'password'=>$pass
		));

	

}else{}



if(isset($_POST['pseudo'])&&isset($_POST['mail1'])&&isset($_POST['password'])&&$dispos==2){
	echo 'Bienvenue, '.$_POST['pseudo'].'!';
header ('Location:index.php?p=home');
}

?>




	
		 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
			<script type="text/javascript">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>



<script>


	$(window).load(function(){


		$('#inscritForm').slideDown(1000);
	})


			$('#mail1').input(function(){
 					if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail1)) {
 					$('#mail1').css('backgroundColor', 'green');
					} else {

					$('#mail1').css('backgroundColor', 'red');

					}
				})
				function checker(){

					

						var pseudo = $('#pseudo').val();
						var mail1 = $('#mail1').val();
						var mail2 = $('#mail2').val();
						var pass = $('#password').val();
						var correct=0;

					
 					if (pseudo.length<3){
 						alert ("votre pseudo doit comporter au minimum 3 caracteres");
 					}else if (pseudo.length>10){
 						alert ("votre pseudo ne doit pas comporter plus de 10 caracteres");
 					}else{
 						correct+=1;
 					}

 					if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail1)) {
 						correct+=1;
					} else {
					    alert("Adresse e-mail invalide !");
					}


				 	// 	if (mail1!==mail2){
						// 	alert('vos deux adresse mail ne sont pas identiques. ');
						// }

						if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail1) && mail1==mail2) {
							correct+=1;
						}

						if (pass.length<4){
							alert('votre mot de passe doit contenir entre 4 et 8 caracteres');
						}else if (pass.length>8){
							alert('votre mot de passe doit contenir entre 4 et 8 caracteres');
						}else{
							correct+=1;
						}

						
			}
				
			</script>
</div>