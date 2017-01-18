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
    <title>Commentaires des articles</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
  <meta name="viewport" content="initial-scale=1, maximum-scale=4">
</head>
<body>
<img src="css/sunset.jpg" alt="image0.jpg" style="    width: 100%; height: 10em;">

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
#commentaire{

  text-align: center;
}
#comp{
  text-align: center;
  background-color: rgba(227,195,232,0.1);
}

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
li.col-sm-4
{
 font-size: 2em;
}
h3
{
  font-family: "Britannic";
  text-align: center;

}
#auteur
{
  font-family: "Rockwell";
  text-align: center;

}
#date
{
  font-family: "Rockwell";
  text-align: center;

}
#container
{

  padding: 0;
  text-align: justify;


}
#comment
{
  font-family: "Rockwell";
  text-align: justify;
  padding: 1.5em;
}
#author
{
  text-align: center;
}
#data
{
  text-align: center;
}
h4
{
  font-family: "Rockwell";
  text-align: center;

}
#commentaire
{
  background-color: rgba(227,195,232,0.1);

  padding-left: 0.5em;
  padding-right: 0.5em;
  border-radius: 1em;
  padding-bottom: 0.6em;

}
label
{
  margin-top: 1.1em;
}
a
{
  font-family: "Rockwell";
}
input
{
  margin-top: 0.8em;
}
textarea
{
  margin-top: 0.8em;
  margin-bottom: 0.8em;
}

</style>

    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=blog_final;charset=utf8', 'root', '');
    }

    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    if(isset($_GET['id']))
    {
        // On récupère le contenu de la table articles
        $reponses = $bdd->query('SELECT * FROM articles where id="'.$_GET['id'].' " ');
        $articles = $reponses -> fetch(PDO::FETCH_ASSOC);
    }

    ?>

    <div class="container-fluid">
      <div class="panel panel-default col-sm-8 col-sm-offset-2" id="container" >

                  <div id="comp" class="panel-heading"><h3><?php echo (isset($articles['title'])) ? $articles['title'] : "Article not exist" ; ?></h3></div>

                <p id="comment">
                    <?php echo (isset($articles['text'])) ? $articles['text'] : "Article not exist"; ?>
                </p>

                <p id="author">Article de:
                    <?php echo (isset ($articles['author'])) ? $articles['author'] : "Article not exist"; ?>
                </p>

                <p id="data">Paru le:
                    <?php echo (isset($articles['date'])) ? $articles['date'] : "Article not exist"; ?>
                </p>
            </div>
        </div>
        <?php
        $req = $bdd->query("SELECT * FROM comments where id_articles=".$_GET['id']." ORDER BY id DESC;");

        $reponses = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponses as $reponse){


            ?>
             <div class="panel panel-default col-sm-8 col-sm-offset-2" id="container" >
            <p id="auteur">Commentaire de : <?php echo $reponse['author']; ?></p>
            <p id="date">Paru le: <?php echo $reponse['date']; ?></p>

            <p id="comment"><?php echo $reponse['comment']; ?></p>

            </div>


            <?php }
            ?>

         <div class="panel panel-default col-sm-8 col-sm-offset-2" id="container" >
        <form id="commentaire" classs="form-group" action="" method="post">

          <div ><label for="comment">Laisser un commentaire</label></br></div>
          Auteur:<input class="form-control" type="text" name="author" placeholder="Auteur du commentaire"/><br/>
          Commentaire:<textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Ecrivez votre commentaire ici"></textarea>
          <button type="submit" class="btn btn-warning">Envoyer</button>

      </form>

  </div>


  <?php

  if(isset($_REQUEST['author']) && isset($_REQUEST['comment'])){

    $author = $_REQUEST['author']; $comment= $_REQUEST['comment'];
    $sql = 'INSERT INTO comments(author, comment, date, id_articles) VALUES(:author, :comment, NOW(), :id_articles)';
    $req = $bdd->prepare($sql);
    // var_dump($req);
    $req->bindParam(':author', $author);
    $req->bindParam(':comment', $comment);
    $req->bindParam(':id_articles', $_GET["id"]);
    $result = $req->execute();
}


?>



<script src="Bootstrap/js/bootstrap.min.js">
</script>
</body>
</html>
