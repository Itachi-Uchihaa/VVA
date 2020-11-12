<?php
session_start();
	$con = mysqli_connect("localhost", "root", "", "resa");
    mysqli_set_charset($con, 'utf8');
    require_once('fonctions.php');

    
    //Isset  : est ce que la valeur est definie
    $no =isset($_POST['NORESA'])?$_POST['NORESA']:'';
    $nbre_place = (int)isset($_POST['NBOCCUPANT'])?$_POST['NBOCCUPANT']:'';
    $DATE =isset($_POST['DATEDEBSEM'])?$_POST['DATEDEBSEM']:'';  
    $req = "UPDATE resa SET DATEDEBSEM = '".$_POST["date"]."', NBOCCUPANT='$nbre_place' WHERE NORESA = '$no'";
    echo $req;
    echo "</br>";
    echo $_POST["date"];


    $res = mysqli_query($con,$req);

  // CODE ORIGINE  // $req = "UPDATE resa SET DATEDEBSEM = '$DATE', NBOCCUPANT='$nbre_place' WHERE NORESA = '$no'";
    header("Location:reservationModifier.php?NORESA=$no&enregistrement=ok");
?>


<!-- <label
//$req=SELECT DATE_DEBSEM FROM SEMAINE
//$res=mysqli_query($con,$req);
//date=mysqli_fetch_array($res);
//while(mysqli_fetch_array($res))
{
  echo"<option value=."$date['date_debsem']".>".$date."<option>">";
}
<label> -->