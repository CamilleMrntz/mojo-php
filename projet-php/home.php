<?php
require 'poster.php'
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
<?php 
 require 'header.php';
?>
<section>
    <div class="add-post">
        <?php require 'upload_img.php' ?>
    </div>
<div class="afficher-post">
    <?php
        while ($all_post = $d->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="post">';
                echo '<h3>Publier par : ' . '<a href="profil-autre-utilisateur.php?id_abonne=' . $all_post['id_abonne'] . '">' . $all_post['pseudo'] . '</a>' . '</h3>';
                echo '<p class="date-post">Le : ' . $all_post['heure_de_post'] . '</p>';
                echo '<p class="bio-post">' . $all_post['content'] . '</p>';
                echo '<img src="' . 'upload/'.$all_post['photo'] . '"' . 'alt="photo">';
                echo '<a href="commentaire.php?id_post=' . $all_post['id_post'] . '">Commentaire</a>';
            echo '</div>';
        }
    ?>
</div>
</section>
</body>

