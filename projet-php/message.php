<?php
// $bdd = new PDO ('mysql:host=localhost;dbname=mojo;charset=utf8', 'root', '');
require 'connexion-data.php';
if (isset($_POST['envoyer'])){
	if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$message = nl2br(htmlspecialchars($_POST['message']));

		$insererMessage = $pdo ->prepare('INSERT INTO message(pseudo, message)VALUES (?, ?)');
		$insererMessage-> execute(array($pseudo, $message));
	}else{
		echo"Veuillez compléter tout les champs ...";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Messagerie Instantatée</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="mojo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php 
 		require 'header.php';
	?>
	<section class="titre-message">
		<h3>Discuter avec les membres de la communauté en temps réel !</h3>
	</section>
	<section class="form-message">
		<form method="POST" action="">
			<input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']?>" readonly="readonly" class="discussion">
			<textarea name="message" placeholder="Votre message..." class="discussion" rows="5" cols="40"></textarea>
			<input type="submit" name="envoyer" class="discussion">
		</form>
	</section>
	<section id="messages">
		
	</section>

	<script>
		setInterval('load_messages()', 500);
		function load_messages(){
			$('#messages').load('loadMessages.php');
		}
	</script>

</body>
</html>