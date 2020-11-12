


  <?php
  session_start();
  include_once("head.php");
  require_once('fonctions.php');
  $con = mysqli_connect("localhost", "root", "", "resa");
    include_once("navbar.php");

//Reserver 

if (isset($_POST['Valider'])){
  Reserver($_POST['noheb'],$_POST['date'],$_POST['nombrePersonne'],$_POST['prix']);
  echo "Reservtion reussi";
}
?>


<?php include "IndicatinUtilisateur.php"; ?>