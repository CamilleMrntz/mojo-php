<?php

$f = $pdo->query("SELECT * FROM follow WHERE id_suiveur = '$_SESSION[id_abonne]' AND id_suivi = '$_GET[id_abonne]' ");

if (isset($_POST['follow'])) {
    $pdo->exec("INSERT INTO follow (id_suiveur, id_suivi) VALUES ('$_SESSION[id_abonne]','$_GET[id_abonne]')");
    header("location:" . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['unfollow'])) {
    $pdo->exec("DELETE FROM follow WHERE id_suiveur = '$_SESSION[id_abonne]' AND id_suivi = '$_GET[id_abonne]' ");
    header("location:" . $_SERVER['REQUEST_URI']);
}

 if ($f->rowCount() >= 1) { ?>
    <form method="post">
    <input class="follow" type="submit" value="Unfollow" name="unfollow">
    </form>
<?php } else { ?>
    <form method="post">
    <input class="follow" type="submit" value="Follow" name="follow">
    </form>
<?php } ?>
      




