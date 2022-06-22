<?php
require 'connexion-data.php';
if ($_POST) {
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
    $r = $pdo->query("SELECT * FROM abonne WHERE email = '$_POST[email]'");
    // Si il y a un ou plusieur résultats 
    if($r->rowCount() >= 1){
        $erreur .= '<p>Email déjà utilisé.</p>';
    }

    // Je verifie si le pseudo n'est pas deja présent sur la bdd
    $r = $pdo->query("SELECT * FROM abonne WHERE pseudo = '$_POST[pseudo]'");
    // Si il y a un ou plusieur résultats 
    if($r->rowCount() >= 1){
        $erreur .= '<p>Pseudo déjà utilisé.</p>';
    }

    // Je gere les probleme d'apostrophe pour chaque champs grace à une boucle 
    foreach($_POST as $indice => $valeur) {
        $_POST[$indice] = addslashes($valeur);
    }

    // Je hash le mdp 
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    if(empty($erreur)) {
        $pdo->exec("INSERT INTO abonne (nom, prenom, pseudo, sexe, email, mdp, birth) VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[pseudo]', '$_POST[sexe]', '$_POST[email]', '$_POST[mdp]', '$_POST[birth]')");
        $content = "Inscription validé !";
    }

    // J'ajoute le contenu de $erreur à l'interieur de $content 
    $content .= $erreur;
}
?>

