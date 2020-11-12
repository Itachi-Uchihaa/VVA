<?php
session_start();


require_once('fonctions.php');
$con = mysqli_connect("localhost", "root", "", "resa");

include_once("head.php");
include("navbar.php");

?>


<!doctype html>
<html>
<header>  
<meta charset="utf-8" />
<strong><h3 align="center"> CONSULTER UN HÉBERGEMENT</strong>
<br>

<br>
<a href="NouvelleHebergement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #5da02f" >AJOUTER</a>


<br>
<br>
</h3>

</header> 

<style>
.col-lg-12{
	height: 40%;
}

</style>

<?php
	$con = mysqli_connect("localhost", "root", "", "resa");
	mysqli_set_charset($con, 'utf8');
	
	// APPEL DE LA RECHERCHE
	include("recherche_heb.php");
	$requete ="SELECT *
		FROM hebergement ";
	if(isset($_POST['Recherche'])) {
	
		$NBPLACEHEB = $_POST['NBPLACEHEB'];
		$SURFACEHEB = $_POST['SURFACEHEB'];
		$TARIFSEMHEB = $_POST['TARIFSEMHEB'];
		$CODETYPEHEB = $_POST['CODETYPEHEB'];
		$INTERNET = $_POST['INTERNET'];
		$SECTEURHEB = $_POST['SECTEURHEB'];
		$ORIENTATIONHEB = $_POST['ORIENTATIONHEB'];
		if(isset($NBPLACEHEB) && $NBPLACEHEB >0){
			$tab[] = " NBPLACEHEB >= $NBPLACEHEB ";
		}
		if(isset($SURFACEHEB) && $SURFACEHEB >0){
			$tab[] = " SURFACEHEB >= $SURFACEHEB ";
		}
		if(isset($TARIFSEMHEB) && $TARIFSEMHEB >0){
			$tab[] = " TARIFSEMHEB >= $TARIFSEMHEB ";
		}
		if(isset($CODETYPEHEB) && $CODETYPEHEB !='%'){
			$tab[] = " CODETYPEHEB = '$CODETYPEHEB' ";
		}
		if(isset($INTERNET) && $INTERNET !='%'){
			$tab[] = " INTERNET = $INTERNET ";
		}
		if(isset($SECTEURHEB) && $SECTEURHEB !='%'){
			$tab[] = " SECTEURHEB = '$SECTEURHEB' ";
		}
		if(isset($ORIENTATIONHEB) && $ORIENTATIONHEB !='%'){
			$tab[] = "ORIENTATIONHEB  = '$ORIENTATIONHEB' ";
		}
		for ($i=0; $i<count($tab); $i++) {
			if($i==0)
				$requete.=" WHERE ";
			else
				$requete.=" AND ";
				$requete.=$tab[$i]; // Avec insertion d'un espace entre 2 valeurs
		}
	}
	$con = mysqli_connect("localhost", "root", "", "resa");
	mysqli_set_charset($con, 'utf8');
	echo" REQUETE ==> $requete";
	$res = mysqli_query($con,$requete);
	
	
?>


<div class = "container" align="center" class="row col-sm-10 col-md-10 col-lg-10">
	<table class='table table-bordered table-condensed table-body-center table-hover table-striped' >
		<tr style='background-color:#60B8CA'>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Photo</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Nom </h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Type </h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Tarif </h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Nombre de place</h5></th>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Surface</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Description</h5></th>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Orientation</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Modification</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Suppression</h5></th>
			<!-- <th style='border-right:1px solid #C0C0C0 ;'><h5 align ='center' style='color:white'>Ajouter</h5></th> -->
		</tr>		
<?php

	while($ligne=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td style='width:200px;'>";
			echo "<img style='width:100%;'src=image/".$ligne['PHOTOHEB'].">";
		echo "</td>";

		echo "<td>";
			echo $ligne['NOMHEB'];
		echo "</td>";

		echo "<td>";
			echo $ligne['CODETYPEHEB'];
		echo "</td>";

		echo "<td>";
			echo $ligne['TARIFSEMHEB'];
		echo "</td>";
		
		echo "<td>";
			echo $ligne['NBPLACEHEB'];
		echo "</td>";
		
		echo "<td>";
			echo $ligne['SURFACEHEB'];
		echo "</td>";
		
		echo "<td>";
			echo $ligne['DESCRIHEB'];
		echo "</td>";
		echo "<td>";
			echo $ligne['ORIENTATIONHEB'];
		echo "</td>";

		echo'<td><a href="hebergementModifier.php?noheb='.$ligne['NOHEB'].'">';
			echo"<input type='submit' name='Modifier' value='Modifier' class='btn btn-warning'>";
		echo"</a></td>";

		echo'<td><a href="trt_supprimer.php?noheb='.$ligne['NOHEB'].'">';
			echo"<input type='submit' name='Suprimer' value='Supprimer' class='btn btn-danger'>";
		echo"</td>";

		// echo'<td><a href="trt_ajouter.php?noheb='.$ligne['NOHEB'].'">';
		// 	echo"<input type='submit' name='Ajouter' value='Ajouter' class='btn btn-danger'>";
		// echo"</td>";
	}
?>
	</table>
	<br>

	<a href="NouvelleHebergement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #5da02f">AJOUTER</a>
	<br>
	<br>
</div>
<?php include "IndicatinUtilisateur.php"; ?>
</html>
