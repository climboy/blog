<?php
# @Author: Bamb!e <r00ted>
# @Date:   11-Jan-2017
# @Email:  vincent.g@codeur.online
# @Project: Blog_final
# @Last modified by:   Bamb!e
# @Last modified time: 13-Jan-2017
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style2.css">
	<script src="Bootstrap/js/bootstrap.min.js">

	</script>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<img src="css/phone.jpg" alt="image0.jpg" style="    width: 100%; height: 10em;">
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	          <div class="container-fluid">
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
	                  <li class=" col-sm-4"><a href="equipe.php">L'équipe</a></li>
	              </ul>
	          </div>
	        </div>
	      </nav>
	<script src="https://code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<div class="container">


	<form id="form" classs="form-group" action="?" method="post" name="formulaire">
		<h1> Ecrire un article </h1>
		<h5>Auteur :</h5><input class="form-control" type="text" name="author" /><br/>
		<h5>Titre :</h5><input class="form-control" type="text" name="title" /><br/>
		<h5>Texte :</h5><textarea type="text" class="form-control" name="text" rows="3"></textarea><br/>
		<div class="buttons">
	<button type="submit"  class="btn btn-warning">Envoyer</button>
	<button class="btn btn-info" type="reset">Reset</button>
</div>
	</form>
</div>

	</div>

<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=blog_final;charset=utf8', 'root', '');
	}

	catch (Exception $e){
		die('');
	}

	if(isset($_REQUEST['author']) && isset($_REQUEST['title'])&& isset($_REQUEST['text'])){

		$author = $_REQUEST['author']; $title = $_REQUEST['title']; $text= $_REQUEST['text'];
		$req = $bdd->prepare('INSERT INTO articles(author, title, text, date) VALUES(:author, :title, :text, NOW())');

		$req->bindParam(':author', $author);
		$req->bindParam(':title', $title);
		$req->bindParam(':text', $text);
		$req->execute();
		var_dump ($req);

		header('Location: index.php');
  exit();
	}
	?>
	<script src="Bootstrap/js/bootstrap.min.js">
	</script>
</body>
</html>
