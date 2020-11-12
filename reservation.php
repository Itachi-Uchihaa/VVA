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
<strong><h3 align="center"> LES RESERVATIONS</strong>
</header>  

<?php
	$con = mysqli_connect("localhost", "root", "", "resa");
	mysqli_set_charset($con, 'utf8');
	$req = "SELECT *
			FROM resa";

    $res = mysqli_query($con,$req);

    $req2 = "SELECT * FROM hebergement";
    $res2 = mysqli_query($con,$req2);
   
    //date de départ : DATEDEBSEM
    // $dateDepart = SavoirReservation($NOHEB, $row['DATEDEBSEM']);
    // $duree = 1;
    // $dateDepartTimestamp = strtotime($dateDepart);
    // $dateFin  = date('DATEDEBSEM', strtotime('+'.$duree.' week', $dateDepartTimestamp ));
    // echo "date depart $dateDepart ";
    // echo "duree $duree ";
    // echo "date depart Timestamp $dateDepartTimestamp ";
    // echo "date de fin $dateFin"
    
    // $date = date($_POST['DATEDEBSEM']);//  ici ta date
    // $date = strtotime(date($date['DATEDEBSEM'], strtotime($date)) . " +7 days");
    // echo "la date est la $date";       // ajouter 1 semaine


?>

<div class = "container" align='center'>
	<table class='table table-bordered table-condensed table-body-center table-hover table-striped' >
		<tr style='background-color:#60B8CA'>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>No.resa</h5></th>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>No.hebergement</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Utilisateur </h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white' td='padding: 35px'>Arrivé </h5></th>
			<!-- <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Départ </h5></th> -->
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Avance payé</h5></th>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Nb.occupant</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Tarif</h5></th>
            <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Etat.resa</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Modification</h5></th>
			<th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Annulation</h5></th>
		</tr>	


        <?php
        
        while($ligne=mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>";
                echo $ligne['NORESA'];
            echo "</td>";

            echo "<td>";
                echo $ligne['NOHEB'];
            echo "</td>";

            echo "<td>";
                echo $ligne['USER'];
            echo "</td>";

            echo "<td>";
                echo $ligne['DATEDEBSEM'];
            echo "</td>";
            
            // echo "<td>";
            // // echo $ligne['DATEDEBSEM'].strtotime('+1 week');
            // echo $dateFin;
            // echo "</td>";
            
            echo "<td>";
                echo $ligne['MONTANTARRHES'];
            echo "</td>";
            
            echo "<td>";
                echo $ligne['NBOCCUPANT'];
            echo "</td>";

            echo "<td>";
                echo $ligne['TARIFSEMRESA'];
            echo "</td>";

            echo "<td>";
                echo $ligne['CODEETATRESA'];
            echo "</td>";

           
            echo'<td><a href="reservationModifier.php?NORESA='.$ligne['NORESA'].'">';
            if($ligne['CODEETATRESA'] != 'N')
                echo"<input type='submit' name='Modifier' value='Modifier' class='btn btn-warning'>";
            echo"</a></td>";

            echo'<td><a href="trt_annuler_resa.php?NORESA='.$ligne['NORESA'].'">';
            if($ligne['CODEETATRESA'] != 'N')
                echo"<input type='submit' name='Suprimer' value='Annuler' class='btn btn-danger'>";
            echo"</td>";


        }
        ?>
    </table>
    <br>
</div>
<?php include "IndicatinUtilisateur.php"; ?>
</html>