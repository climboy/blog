<?php
# @Author: Bamb!e <r00ted>
# @Date:   12-Jan-2017
# @Email:  vincent.g@codeur.online
# @Project: Blog_final
# @Last modified by:   Bamb!e
# @Last modified time: 13-Jan-2017
?>

<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
<img src="css/ipad.jpg" alt="image0.jpg" style="    width: 100%; height: 10em;">
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
        <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
   </div>
	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="col-sm-4"><a href="index.php">Accueil</a></li>
                    <li class="col-sm-4"><a href="articles.php">Créer un Article</a></li>
                    <li class="col-sm-4"><a href="equipe.php">L'équipe</a></li>
                </ul>
            </div>
					</div>
        </nav>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<style>

		#form{
			width:400px;
			margin: 0 auto;

		}

		h1{
			text-align: center;
			font-size: 3em;
			margin-bottom: 2.2em;
			margin-top: 1.3em;
		}

		p{
			word-spacing: 0.4em;
		}

		body{
			background-color: #FFFAFA;
		}

		ul.nav{
			width: 100%;
			text-align: center;
		}

		#container{

			text-align: center;
			padding: 0;
		}
		li.col-sm-4
		{
			font-size: 2em;
		}
    #text
		{
			text-align: justify;
			font-family: "Rockwell";
		}
		h3
		{
			font-family: "Britannic";
			padding: 0;
		}
		#auteur
		{
			font-family: "Rockwell";
		}
		#date
		{
			font-family: "Rockwell";
		}
		a
		{
			font-family: "Rockwell";
		}
		#titre
		{

		}
		#comp
		{
			background-color: rgba(227,195,232,0.1);
		}

	</style>


  	<?php
  	try{
  		$bdd = new PDO('mysql:host=localhost;dbname=blog_final;charset=utf8', 'root', '');
  	}

  	catch (Exception $e){
  		die('Erreur : ' . $e->getMessage());
  	}

  	$reponses = $bdd->query('SELECT * FROM articles ORDER BY id DESC');

  	foreach($reponses as $reponse){

  		?>

<body>





<div class="panel panel-default col-sm-8 col-sm-offset-2" id="container" >
  <div class="panel-heading" id="comp"><h3><?php echo $reponse['title']; ?></h3></div>
  <div class="panel-body">
		<p id="text"><?php echo $reponse['text']; ?></p>

		<a href="comments.php?id=<?php echo $reponse['id']; ?>">Lire plus et laisser un commentaire</a>

		<p id="auteur">Ecrit par: <?php echo $reponse['author']; ?></p>

		<p id="date">Paru le: <?php echo $reponse['date']; ?></p>
  </div>
</div>


  		<?php } ?>

<script src="Bootstrap/js/bootstrap.min.js">

</script>
    </body>
    </html>
