<?php require 'auth-inscription.php' ?>
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
            <h1 class="title-form">INSCRIPTION</h1>
             <p class="bio"> Rejoins MOJO, l'unique communauté sneakers dans laquelle tu peux partager ta passion !</p>
             <?php echo $content ?>
            <form method="post" class='form-inscription'>
                <input type="text" name="nom" id="nom" placeholder="Nom de famille" required>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                <select name="sexe" id="sexe">
                    <option value="homme" selected>Homme</option>
                    <option value="femme">Femme</option>
                </select>
                <input type="email" name="email" id="email1" placeholder="E-mail" size="45" required>        
                <input type="password" name="mdp" id="mdp1" placeholder="Mot de passe" size="45" required>
                <input type="date" name="birth" id="birth" required>        
                <input type="submit" value="S'inscrire" class="btn-inscription">
            </form>
            <a href="index.php" class="btn-retour">Retour</a>
        </div>

        <img src="img/rightimage.jpg" class="img-right">
    </section>
</body>
</html>