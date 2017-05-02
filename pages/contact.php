

<h2>CONTACT</h2>


<div id ="charge">
</div>

<p style="margin-top: 60px">
Tel: 01-43-62-48-29<br>
WWW.SERIALBLOG.FR<br>
WWW.SERIALBLOG.COM
</p>


<form style="position: absolute;left: 450px; top: 180px; ">
<fieldset>
<label class="lab" for="prenom">Votre prénom</label><input type="text" name="prenom"><br>
<label class="lab" for="mail">Votre mail</label><input type="text" name="mail"><br>
<label for="lab" class="lab" >Votre question : </label><textarea style="border-radius: 5px;" cols=40 rows=3;></textarea><br>
<input style="position: relative;left: 386px;" type="submit" value="Envoyer">

<fieldset>
</form>
<style>
.lab{
	width: 150px;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
	
$('#charge').load('concept.php');
</script>