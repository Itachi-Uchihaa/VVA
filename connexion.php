<?php
$con = mysqli_connect("localhost", "root", "", "resa");
 ?>
<html> 
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleConnexion.css" />
<title>Connexion</title>
</head>
<body>

<h2><a href="Accueil.php" class="btn btn-primary">RETOUR</a></h2>
	<div id="container">
	<!-- zone de connexion -->

	<form action="traitement_connexion.php" method="POST">
		<h1>Connexion</h1>
		
		<label><b>Nom d'utilisateur</b></label>
		<input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

		<label><b>Mot de passe</b></label>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required>

		<input type="submit" id='submit' value='LOGIN' >
		<?php
		if(isset($_GET['erreur'])){
			$err = $_GET['erreur'];
			if($err==1 || $err==2)
				echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
		}
		?>
	</form>
	</div>	
			
	
</body>
</html>
