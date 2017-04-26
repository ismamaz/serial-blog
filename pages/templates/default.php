<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Serial Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/BigBlog.css"

  </head>






  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="font-size: 2em;">SERIAL BLOG</a>
          <span style="position: absolute;top:36px;left: 92px;color:white; font-style:italic;">La série que <strong>Vous</strong> écrivez</span>
        </div>
         <ul>
         	<li><a href="?p=home">HOME</a></li>
         	<li><a href="?p=ajouter">AJOUTER</a></li>
         	<li><a href="?p=contact">CONTACT</a></li>
         </ul>
      </div>
    </nav>

    <div class="container" style="padding-top: 100px;">

      <div class="starter-template">
        

  <?php
echo $content;
  ?>

      </div>

    </div><!-- /.container -->

<footer>


		<ul>
         	<li><a href="?p=home">HOME</li>
         	<li><a href="?p=ajouter">AJOUTER</li>
         	<li><a href="?p=contact">CONTACT</li>
         </ul>

         <div id="planning">
         <a href="?p=planning">Road Map</a>
         </div>
</footer>
 
  </body>
</html>

