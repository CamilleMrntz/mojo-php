
<?php
require 'connexion-data.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mojo.css">
    <title>Profil</title>
</head>

<body>
<?php 
 require 'header.php';
?>

<section class="profil-description">
    <?php
        $now =  new \DateTime($_SESSION['birth']);
        $date = $now->format('d-m-Y');
        echo '<div>';
        echo '<p class="prenom">'. ucwords($_SESSION['prenom']) . '</p>' ;
        echo '</div>';
        echo '<div class="btn-modif">';
        echo '<a href="modification-abonne.php"><button class="modif-profil">Modifier mon profil</button></a>';
        echo '</div>';
    ?>
</section>
<section class="profil-publication">
    <h3>Toutes mes publications</h3>
    <?php
    $d = $pdo->query("SELECT * FROM post WHERE id_abonne = '$_SESSION[id_abonne]'");
        while ($all_post = $d->fetch(PDO::FETCH_ASSOC)) {
            echo '<div>';
                echo '<a href="commentaire.php?id_post=' . $all_post['id_post'] . '"><img class ="img-profil" src="' .'upload/'.$all_post['photo'] . '"' . 'alt="photo"></a>';
            echo '</div>';
        }
    ?>

</section>
    
</body>

</html>