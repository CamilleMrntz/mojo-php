
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mojo.css">
    <title>MOJO</title>
</head>
<body class="commentaire-page">
    <?php
    require 'connexion-data.php';

    if(isset($_POST['commentaire'])) {
        $_POST['content'] = addslashes($_POST['content']);
        // J'envoie les informations dans la bdd 
        $pdo->exec("INSERT INTO commentaire (id_post, pseudo, content, heure_message) VALUES ('$_GET[id_post]','$_SESSION[pseudo]', '$_POST[content]', NOW())");
    }

    $c = $pdo->query("SELECT * FROM commentaire WHERE id_post = '$_GET[id_post]'");
    $p = $pdo->query("SELECT * FROM post WHERE id_post = '$_GET[id_post]'");
    $photo = $p->fetch(PDO::FETCH_ASSOC);
    ?>
    <h3 class='commentaire-page-title'>Commentaires</h3>
    <div class="btn-precedent"><a href="home.php" class="btn-inscription"><--</a></div>
    <?php
    echo '<main class="main-commentaire">';
        echo '<div class="sub-main">';
            echo '<img src="' . 'upload/'.$photo['photo'] . '"' . 'alt="photo" class="img-commentaire">';
    
            $l = $pdo->query("SELECT * FROM aime WHERE  id_likeur = '$_SESSION[id_abonne]' AND id_post = '$_GET[id_post]' ");
            $nblike = $pdo->query("SELECT * FROM aime WHERE id_post = '$_GET[id_post]' ");
            // $l = $pdo->query("SELECT * FROM aime a, post p WHERE a.id_post = p.id_post AND id_likeur = '$_SESSION[id_abonne]'");

             if (isset($_POST['like'])) {
                $pdo->exec("INSERT INTO aime (id_post, id_likeur) VALUES ('$_GET[id_post]', '$_SESSION[id_abonne]')");
                header("location:" . $_SERVER['REQUEST_URI']);
            }

            if (isset($_POST['dislike'])) {
                $pdo->exec("DELETE FROM aime WHERE id_likeur = '$_SESSION[id_abonne]' AND id_post = '$_GET[id_post]' ");
                header("location:" . $_SERVER['REQUEST_URI']);
            }
            echo '<div class="zone-like">';
                echo $nblike->rowCount() . " " . 'like';
                if ($l->rowCount() >= 1) { ?>
                    <form method="post">
                        <button type="submit" name="dislike" title="dislike" class="like"><img src="img/like.svg" alt="" /></button>
                    </form>
                <?php } else { ?>
                    <form method="post">
                        <button type="submit" name="like" title="like" class="like"><img src="img/unlike.svg" alt="" /></button>
                    </form>
                    <?php } 
            echo '</div>';

            echo '<div class="zone-commentaire">';
                while ($commentaire = $c->fetch(PDO::FETCH_ASSOC)) {
                    echo '<p>'. $commentaire['pseudo'] . ' : ' . $commentaire['content'] . '</p>' ;
                }
            echo '</div>';
    ?>
            <form method="post" class="add-commentaire">
                <textarea name="content" id="content" placeholder="Laissez votre commentaire ici" required></textarea>
                <input type="submit" value="Poster" class="btn-inscription" name="commentaire">
            </form>
        </div>
    </main>
    
</body>




   

