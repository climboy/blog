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
	<script src="Bootstrap/js/bootstrap.min.js">

	</script>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<img src="css/phone.jpg" alt="image0.jpg" style="    width: 100%; height: 10em;">
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
	                  <li class=" col-sm-4"><a href="equipe.php">L'équipe</a></li>
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
	/*@font-face {
		font-family: 'Conv_watchtower';
		src: url('css/watchtower.eot');
		src: local('☺'), url('css/watchtower.woff') format('woff'), url('css/watchtower.ttf') format('truetype'), url('css/watchtower.svg') format('svg');
		font-weight: normal;
		font-style: normal;
	}*/
	h1{

		font-size: 39px;
		font-family: "Britannic";
		font-variant: normal;
		font-weight: 400;
		line-height: 66.7px;
		text-align: center;
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

	.container
	{
		background-color: rgba(227,195,232,0.1);






	}

	.buttons
	{
		text-align: center;

	}
	input{
		font-size: 39px;
		font-family: "Stencil";
		font-variant: normal;
		font-weight: 400;
		line-height: 66.7px;
		text-align: center;
	}
	textarea
	{
		font-size: 39px;
		font-family: "Stencil";
		font-variant: normal;
		font-weight: 400;
		line-height: 66.7px;
		text-align: center;
	}
	a
	{
		font-family: "Rockwell";
	}
 li.col-sm-4
 {
 	font-size: 2em;
 }
 .form-control
 {
 	font-family: "Rockwell";
 }
 h5
 {
 	font-family: "Rockwell";
 }
			</style>

<div class="container">


	<form id="form" classs="form-group" action="index.php" method="post" name="formulaire">
		<h1> Ecrire un article </h1>
		<h5>Auteur :</h5><input class="form-control" type="text" name="author" /><br/>
		<h5>Titre :</h5><input class="form-control" type="text" name="title" /><br/>
		<h5>Texte :</h5><textarea type="text" class="form-control" name="text" rows="3"></textarea><br/>
		<div class="buttons">
	<a href="index.php"><button type="submit"  class="btn btn-warning">Envoyer</button></a>
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


		header('Location: index.php');
    exit();
	}
	?>
	<script src="Bootstrap/js/bootstrap.min.js">
	</script>
</body>
</html>
