<?php require 'connexion-data.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mojo.css">
    <title>Modification profil</title>
</head>

<body>
<?php 
 require 'header.php';
?> 

<?php

if ($_POST) {
    // $pdo->exec("UPDATE abonne SET (nom, prenom, pseudo, email) VALUES ('$_POST[nom]','$_POST[prenom]', '$_POST[pseudo]', '$_POST[email]') WHERE id_abonne = $_SESSION[id_abonne]");
    
    
    $erreur = "";
    
        // Si le prenom n'est pas trop court ou trop long
    if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20 ) {
        $erreur .= '<p>Taille de prénom invalide.</p>';
    }
    
    if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['prenom'])) {
        $erreur .= '<p>Format de prénom invalide.</p>'; 
    }
    if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['nom'])) {
        $erreur .= '<p>Format de prénom invalide.</p>'; 
    }
    
        // Je verifie si l'email n'est pas deja présent sur la bdd
    $r = $pdo->query("SELECT * FROM abonne WHERE email = '$_POST[email]' AND id_abonne != '$_SESSION[id_abonne]' ");
        // Si il y a un ou plusieur résultats 
    if($r->rowCount() >= 1){
        $erreur .= '<p>Email déjà utilisé.</p>';
    }
    
        // Je verifie si le pseudo n'est pas deja présent sur la bdd
    $r = $pdo->query("SELECT * FROM abonne WHERE pseudo = '$_POST[pseudo]' AND id_abonne != '$_SESSION[id_abonne]'");
        // Si il y a un ou plusieur résultats 
    if($r->rowCount() >= 1){
        $erreur .= '<p>Pseudo déjà utilisé.</p>';
    }
    
        // Je gere les probleme d'apostrophe pour chaque champs grace à une boucle 
    foreach($_POST as $indice => $valeur) {
        $_POST[$indice] = addslashes($valeur);
    }
    
    if(empty($erreur)) {

    $pdo->exec("UPDATE abonne SET nom = '$_POST[nom]' WHERE id_abonne = $_SESSION[id_abonne]");
    $pdo->exec("UPDATE abonne SET prenom = '$_POST[prenom]' WHERE id_abonne = $_SESSION[id_abonne]");
    $pdo->exec("UPDATE abonne SET pseudo = '$_POST[pseudo]' WHERE id_abonne = $_SESSION[id_abonne]");
    $pdo->exec("UPDATE abonne SET email = '$_POST[email]' WHERE id_abonne = $_SESSION[id_abonne]");

    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['email'] = $_POST['email'];

    $content = "modification validé !";
    }

    $content .= $erreur;
}
?>

<?php 
echo $content;
?>

    <form method="post" class='form-inscription'>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']?>">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']?>">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']?>">
        <label for="email1">E-mail</label>
        <input type="email" name="email" id="email1" value="<?php echo $_SESSION['email']?>" size="45">          
        <input type="submit" value="Enregistrer mes modifications" class="btn-inscription">
    </form>
    <?php
    echo '<a href="profil.php"><button class="btn-inscription">Retour au profil</button></a>';
    ?>
    
</body>

</html>