<?php
require 'connexion-data.php';


if($_POST) {
    $r = $pdo->query("SELECT * FROM abonne WHERE email = '$_POST[email]' ");

        if($r->rowCount() >= 1) {
            $abonne = $r->fetch(PDO::FETCH_ASSOC);
    
            // Si le mdp poster correspond bien 
            if(password_verify($_POST['mdp'], $abonne['mdp'])) {
                // Je test si le mdp fonctionne 
                $content .= '<p>Email + MDP OK</p>';
                // J'enregistre ses infos dans une session :
                $_SESSION['id_abonne'] = $abonne['id_abonne'];
                $_SESSION['nom'] = $abonne['nom'];
                $_SESSION['prenom'] = $abonne['prenom'];
                $_SESSION['pseudo'] = $abonne['pseudo'];
                $_SESSION['sexe'] = $abonne['sexe'];
                $_SESSION['email'] = $abonne['email'];
                $_SESSION['birth'] = $abonne['birth'];
                // Je redirige l'utilisateur vers la page d'accueil 
                header('location:home.php');
            } else {
                // sinon le mdp est incorrecte 
                $content .= '<p>Mot de passe incorrecte</p>';
            }
        } else {
            $content .= '<p>Email inexistant</p>';
        }
}



?>

