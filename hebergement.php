<?php
session_start();
include("fonctions.php");
$con = Connect();
 ?>


<!DOCTYPE html>
<html lang="en">

<?php
include("head.php");
?>

<body>
	<?php
include("navbar.php");
?>


	<!-- CHALET-->
	<p align="center" id="Appartement"></p>




	<div class="card-deck">
		<?php
			$lesHeb = GetHebergementParType ($_GET['type']);
			while($row=mysqli_fetch_assoc($lesHeb))
			{
				if($row['INTERNET'] == 1){
					$internet = "Internet est disponible";	
				}else{
					$internet = "Internet non disponible";
				}

				echo "<div class='card'>
					<img class='card-img-top' src='image/".$row['PHOTOHEB']."' alt='Card image cap' height='342px' width='160px'>
					<div class='card-body'>
						<p><strong>".$row['NOMHEB']."</strong></p>
						<p>Description: ".$row['DESCRIHEB']."</p>
						<p>Nombre de place: ".$row['NBPLACEHEB']."</p>
						<p>Surface d'hébergement: ".$row['SURFACEHEB']."</p>
						<p>Année de construction: ".$row['ANNEEHEB']."</p>
						<p>".$internet."</p>
						<p>Secteur: ".$row['SECTEURHEB']."</p>
						<p>Orientation de l'hébergement: ".$row['ORIENTATIONHEB']."</p>
						<p>Etat: ".$row['ETATHEB']."</p>
						<p>Tarif par semaine: ".$row['TARIFSEMHEB']."</p>";

					if(isset($_SESSION['type_compte']) && $_SESSION['type_compte'] == true)
						{
							echo	"<a href='formulaireReservation.php?t=".$row['NOHEB']."' class='btn btn-primary'>Réserver</a>";
						}

						
						
					echo"</div>
					</div>"
					;
			}
		?>

	</div>
</body>
<br>
<?php include "IndicatinUtilisateur.php"; ?>