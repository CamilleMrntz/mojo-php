<?php
// $bdd = new PDO ('mysql:host=localhost;dbname=mojo;charset=utf8', 'root', '');
require 'connexion-data.php';
$recupMessages = $pdo->query('SELECT * FROM message');
while($message = $recupMessages-> fetch()){
    ?>
    <div class="message">
    <!-- chevron ouvert + ?= est le diminutif de écho en php  -->
    <?php
        if ($message['pseudo'] == $_SESSION['pseudo'] ) { ?>
            <h4 class="pseudo-by-me"><?= $message['pseudo']; ?> :</h4>
            <p class="message-by-me">- <?= $message ['message']; ?></p>
       <?php } else { ?>
           <h4 class="pseudo-by-you"><?= $message['pseudo']; ?> :</h4>
           <p class="message-by-you">- <?= $message ['message']; ?></p>
      <?php } ?> 
    </div>
    <?php
}
?>