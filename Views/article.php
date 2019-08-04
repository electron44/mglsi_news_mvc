<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités MGLSI</title>
    <!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
<?php require_once('entete.php');?>
<div id="contenu">
    <?php
        require_once('../Controller/Controller.php');
        $controller = new Controller();
        $article = null;
        
        if(isset($_GET['id'])){
            $article = $controller-> article($_GET['id']);
        }
        
        if($article != null) { ?>
        <h1><?= $article->titre ?></h1>
        <span>Publié le <?= $article->dateCreation ?></span>
        <p><?= $article->contenu ?></p>
    <?php } else { ?>
        <meta http-equiv="refresh" content="3; url=../accueil">
        <h1>Aucun article trouvé !</h1>
    <?php } ?>
</div>
<?php
require_once('menu.php');
?>
</body>
</html>
