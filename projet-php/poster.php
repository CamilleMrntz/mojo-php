<?php
require 'connexion-data.php';
if ($_POST) {
    $_POST['content'] = addslashes($_POST['content']);
}



$d = $pdo->query('SELECT * FROM post p, abonne a WHERE p.id_abonne = a.id_abonne ORDER BY id_post DESC');

// $x = $pdo->query("SELECT * FROM post WHERE id_abonne IN (SELECT id_suivi FROM follow WHERE id_abonne = '$_SESSION[id_abonne]')");
// $y = $pdo->query("SELECT * FROM post WHERE id_abonne NOT IN (SELECT id_suivi FROM follow WHERE id_abonne = '$_SESSION[id_abonne]')");
// $z = $pdo->query("SELECT * FROM abonne");
// $d = $pdo->query("SELECT * FROM post p, abonne a, follow f WHERE 'p.id_abonne = a.id_abonne' AND 'a.id_abonne = f.id_abonne' AND 'p.id_abonne = f.id_abonne' AND 'f.id_suiveur = $_SESSION[id_abonne]'");
// $d = $pdo->query("SELECT * FROM post WHERE id_abonne IN (SELECT id_suivi FROM follow WHERE id_suiveur = '$_SESSION[id_abonne]')");
// $d = $pdo->query('SELECT * FROM post p, abonne a, follow f WHERE p.id_abonne = a.id_abonne AND f.id_suiveur = p.id_abonne ORDER BY id_post DESC');



?>