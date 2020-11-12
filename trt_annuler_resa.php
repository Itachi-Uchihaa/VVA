<?php
session_start();
	$con = mysqli_connect("localhost", "root", "", "resa");
    mysqli_set_charset($con, 'utf8');
    require_once('fonctions.php');

    
    //Isset  : est ce que la valeur est definie
    $no =isset($_POST['NORESA'])?$_POST['NORESA']:'';
    $code =isset($_POST['CODEETATRESA'])?$_POST['CODEETATRESA']:'';
 
    // $req = "UPDATE resa SET NBOCCUPANT='$nbre_place' WHERE NORESA = '$no'";
    $req = "UPDATE resa SET CODEETATRESA = 'N' 	WHERE NORESA=".$_GET['NORESA']."";
    echo $req;
    echo $no;
    $res = mysqli_query($con,$req);


    // header("Location:reservation.php?NORESA=$no&enregistrement=ok");
?>

