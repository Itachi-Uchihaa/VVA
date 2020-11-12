<?php

session_start();


if(!empty($_POST['login']) AND !empty($_POST['password']))
{
	$login=htmlspecialchars($_POST['login']);
	$password= htmlspecialchars($_POST['password']);
	$bdd=mysqli_connect("localhost","root","","resa");

	if($bdd)
	{
		$req="SELECT* FROM compte WHERE USER= '" .$login. "' AND MDP= '" .$password. "'" ;
		
		$res=mysqli_query($bdd,$req);
		//
		$num=mysqli_num_rows($res); // donne le nombre d'enrengistrement dans la base renvoyé par la requete
	
		if ($num == 1)
		{
			// CONNEXION
			$ligne=mysqli_fetch_array($res); // prends la ligne une 
			//var_dump($ligne);
			$_SESSION['login'] = $login;
			
			$_SESSION['type_compte'] = $ligne["TYPECOMPTE"];
			//echo $_SESSION['type_compte'];
			 	  if($_SESSION['type_compte'] == "Adm" OR $_SESSION['type_compte'] == "Ges")
			 	  {
			 		header("location: Accueil.php");
			 	  }
			 	 else 
			 	  {
			 	  	header("location: Accueil.php");
			 	  }
			 	  mysqli_free_result($res); // libération de la mémoire des resultats
		}
		else
		{	
			header("location:connexion.php");
			echo "<script>alert('Votre nom utilisateur ou mot de passe est incorrect')</script>";
			
		}
		mysqli_close($bdd); // fermeture de la connexion
	}
	else
	{
		echo "<p> probleme de connexion au serveur</p>";
	}	
}
?>


