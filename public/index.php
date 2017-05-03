<?php

// require '../app/Autolader.php';
// App\Autoloader::register();



require '../pages/templates/head.php';



// connexion à la bdd via la classe Database
require '../app/class/Database.php';

$db = new Database('BigBlog');

//chargement de la page choisie, home par défaut
ob_start();

if (isset($_GET['p'])){
		$p = $_GET['p'];
}else{
			$p='home';
}

require '../pages/'.$p.'.php';



$content = ob_get_clean();




require '../pages/templates/default.php';
	




// $pdo = new PDO ('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas');

// $req=$pdo->exec('INSERT INTO articles (titre, auteur) VALUES (:titre, :auteur)');


?>