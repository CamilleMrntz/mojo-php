<?php
require 'auth-connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mojo.css">
    <title>MOJO</title>
</head>
<body>

    <section class="page1">
        <div class="left-side">
            <img src="img/img-accueil.jpg" alt="logo-site" class="img-accueil">

        <?php
            echo $content;
        ?>
        <form action="" method="post" class='form-connexion'>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
            <input class="btn-connexion" type="submit" value="Se connecter">
        </form>
        <a href="formulaire.php"><button class="btn-inscription">S'inscrire</button></a>
        </div>
       
        <img src="img/rightimage.jpg" class="img-right">
  
    </section>

</body>

</html>