<?php
function Connect(){
    $con = mysqli_connect("localhost", "root", "", "resa");
    return $con;
}

function GetHebergementParType ($CODETYPEHEB) {
    global $con;
    mysqli_set_charset($con,"utf8");
    $req = "SELECT NOHEB, NOMTYPEHEB, NOMHEB, NBPLACEHEB, SURFACEHEB, INTERNET, ANNEEHEB, SECTEURHEB, ORIENTATIONHEB, ETATHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB FROM hebergement h, type_heb th WHERE h.CODETYPEHEB = th.CODETYPEHEB AND h.CODETYPEHEB ='".$CODETYPEHEB."';";
    $res = mysqli_query($con,$req);
    return $res;


}

function GetHebergementChoisi ($NOHEB) {
    global $con;
    mysqli_set_charset($con,"utf8");
    $sql = "SELECT * FROM hebergement WHERE NOHEB= '".$NOHEB."'";
    $resul = mysqli_query($con,$sql);   
    return mysqli_fetch_assoc($resul); 
}

function GetHebergementChoisiTYPECOMPTE ($TYPECOMPTE) {
    global $con;
    mysqli_set_charset($con,"utf8");
    $sql = "SELECT * FROM hebergement WHERE TYPECOMPTE= '".$TYPECOMPTE."'";
    $resul = mysqli_query($con,$sql);   
    return mysqli_fetch_assoc($resul); 
}

function GetHebergementNoheb($NOHEB){ 
global $con;
mysqli_set_charset($con,"utf8");
$listeNoehb = "SELECT * FROM hebergement WHERE NOHEB='".$NOHEB."'";
$resul = mysqli_query($con,$listeNoehb);   
return $resul;
}
                ///AFINIIR
function GetHebergementNoresa($NORESA){ 
    global $con;
    mysqli_set_charset($con,"utf8");
    $listeNoresa = "SELECT * FROM resa WHERE NORESA='".$NORESA."'";
    $resul = mysqli_query($con,$listeNoresa);   
    return $resul;
}
                // A FINIR EN HAUT 

                
function CreateSemaine()
{
    global $con;
    mysqli_set_charset($con,"utf8");
    for ($i=0; $i < 55; $i++) { 
    $dtDeb = strtotime("next saturday + $i weeks");  
    $laDateDeb = date("Y-m-d", $dtDeb);

    $dtFin = strtotime("next saturday + $i weeks + 1 week");
    $laDateFin = date("Y-m-d", $dtFin);

    
    $req = "INSERT INTO semaine(DATEDEBSEM, DATEFINSEM) VALUES('$laDateDeb','$laDateFin')";
    $resul = mysqli_query($con, $req); 
    sleep(0.1); //Laise au serveur le temps de gerer les requetes et evite les bugs
    }
}


 
//SAVOIR SI LA RESERVATION EST DISPONIBLE 

 function SavoirReservation($NOHEB,$DATE){
    global $con;
    mysqli_set_charset($con,"utf8");
    $req= "SELECT NORESA FROM resa r WHERE NOHEB='$NOHEB' AND DATEDEBSEM='$DATE' AND CODEETATRESA='V'";
    $resul = mysqli_query($con, $req); 
    $count = mysqli_num_rows($resul);
    return $count;
}

//FONCTION QUI VA RECUPERER LES SEMAINE CHOISI

function GETSEMAINE($nb){
    global $con;
    mysqli_set_charset($con,"utf8");
    $DATE = date('Y-m-d');
    $DATEMAX = date('Y-m-d', strtotime("next saturday + $nb weeks"));
    $sql = "SELECT * FROM semaine WHERE DATEDEBSEM > '$DATE' AND DATEDEBSEM < '$DATEMAX' ORDER BY DATEDEBSEM";
    $resul = mysqli_query($con, $sql);
    return $resul;

}

function Reserver ($NOHEB,$DATEDEBSEM,$NBOCCUPANT,$TARIF) {
    global $con;
    mysqli_set_charset($con,"utf8");
    $USER = $_SESSION['login'];
    $DATE = date('Y-m-d');
    $MONTANTARR =  $TARIF*0.2;    //Montant verser en avance
    $req = "INSERT INTO `resa` (`NORESA`, `USER`, `DATEDEBSEM`, `NOHEB`, `CODEETATRESA`, `DATERESA`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `TARIFSEMRESA`)
     VALUES (NULL, '$USER', '$DATEDEBSEM', '$NOHEB', 'V', '$DATE', '$DATE', '$MONTANTARR', '$NBOCCUPANT', '$TARIF');";
    $res = mysqli_query($con,$req);
    return $res;
}