
<div id="inscrit">
	<h1 style="text-align:center;">INSCRIPTION</h1>

		<form id="inscritForm" style="margin-top: 40px;" method="post" action="#">

			<label for="pseudo">Choisissez votre pseudo : </label><input type="text" name="pseudo" id="pseudo" placeholder="ex : asterix" required=""><br>
			<label for="mail1">Votre adresse mail : </label><input type="email" name="mail1" id="mail1" placeholder="ex : asterix@gmail.fr" required><br>
			<label for"mail2">Confirmez votre adresse : </label><input type="email" name="mail2" id="mail2" placeholder="asterix@gmail.fr" required><br>
			<label for="password">Choisissez votre mot de passe : </label><input type="password" name="password" id="password" required><br>
			<input type="submit" id="btn" value="Envoyer" onclick="checker()"> 
			<input type="reset" value="Reset" id="reset">

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
			<script type="text/javascript">



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


				 		if (mail1!==mail2){
							alert('vos deux adresse mail ne sont pas identiques. ');
						}

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

						if (correct=4){
								$('#reset').after('<br><h3 id="etude">Votre formulaire d\'inscription va etre étudié.Veuillez patienter un instant..</h3>';)
						}

			}
				
			</script>
<?php

if (isset($_POST['btn'])){
echo 'Bienvenue, ' .$_POST['pseudo'].' !';
}
?>




		</form>
</div>