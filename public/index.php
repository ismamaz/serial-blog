<?php


require '../app/Autoloader.php';

App\Autoloader::register();

	

ob_start();

if (isset($_GET['p'])){
		$p = $_GET['p'];
	}else{
			$p='home';
	}
require '../pages/'.$p.'.php';
$content = ob_get_clean();


require '../pages/templates/default.php';

$pdo = new PDO ('mysql:host=localhost;dbname=BigBlog;charset=utf8', 'root', 'flingualelas');

$req=$pdo->exec('INSERT INTO articles (titre, auteur) VALUES (:titre, :auteur)');


?>