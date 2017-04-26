






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

