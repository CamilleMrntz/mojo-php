
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
 $abo = $pdo->query("SELECT * FROM abonne WHERE id_abonne = '$_GET[id_abonne]'");
 $abon = $abo->fetch(PDO::FETCH_ASSOC);

?>

<section class="profil-description">
    
    <?php
    if($_GET['id_abonne'] != $_SESSION['id_abonne']) {
            require 'follow.php';
    } else {
        echo '<a href="modification-abonne.php" class=" btn-order"><button class="modif-profil">Modifier mes informations</button></a>';
    }

        $now =  new \DateTime($abon['birth']);
        $date = $now->format('d-m-Y');
        echo '<div>';
            echo '<p class="prenom">'. ucwords($abon['prenom']) . '</p>' ;
        echo '</div>';
    ?>
</section>
<section class="profil-publication">
    <h3>Toutes les publications de <?php echo $abon['pseudo']  ?></h3>
    <?php
    $d = $pdo->query("SELECT * FROM post WHERE id_abonne = '$_GET[id_abonne]'");
        while ($all_post = $d->fetch(PDO::FETCH_ASSOC)) {
            echo '<div>';
                echo '<a href="commentaire.php?id_post=' . $all_post['id_post'] . '"><img class ="img-profil" src="' .'upload/'.$all_post['photo'] . '"' . 'alt="photo"></a>';
            echo '</div>';
        }
    ?>

</section>
    
</body>

</html>