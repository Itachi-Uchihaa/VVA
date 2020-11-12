<?php
session_start();
if(!isset($_GET['t']))  //t est le  noehb ( à changer)
  header('Location: index.php');

require_once('fonctions.php');
$con = mysqli_connect("localhost", "root", "", "resa");
$NOHEB = $_GET['t'];
$row = GetHebergementChoisi($NOHEB);

if(!$row)
header('Location: index.php');
?>

<!DOCTYPE html>
<html>

<?php
include_once("head.php");
?>


<body>
  <?php
include_once("navbar.php");


?>




  <!-- Formulaire de reservation -->
  <font size="10pt">
    <p align="center" style="color: #40A497" ;><strong>Formulaire de Réservation</strong></p>
  </font>


  <form class="formulaire" method="POST" action="resaReussi.php">

<!-- JE MET LE NUMERO D'HEBERGEMENT DANS LE FORMULAIRE -->
  <input type="hidden"  name="noheb" value="<?php echo $NOHEB; ?>"> 
  <input type="hidden"  name="prix" value="<?php echo $row['TARIFSEMHEB']; ?>">      
    <section class="s1">

    <!--  Rajout de la reservation concerné -->

      <div class='card'>
        <img class='card-img-top' src='image/<?php echo $row['PHOTOHEB']; ?>' alt='Card image cap' height='342px' width='160px'>
        <div class='card-body'>
          <p><strong><?php echo $row['NOMHEB']; ?></strong></p>
          <p>Description: <?php echo $row['DESCRIHEB']; ?></p>
          <p>Nombre de place: <?php echo $row['NBPLACEHEB']; ?></p>
          <p>Surface d'hébergement: <?php echo $row['SURFACEHEB']; ?></p>
          <p>Année de construction: <?php echo $row['ANNEEHEB']; ?></p>
          <p><?php echo $row['INTERNET']; ?></p>
          <p>Secteur: <?php echo $row['SECTEURHEB']; ?></p>
          <p>Orientation de l'hébergement: <?php echo $row['ORIENTATIONHEB']; ?></p>
          <p>Etat: <?php echo $row['ETATHEB']; ?></p>
          <p>Tarif par semaine: <?php echo $row['TARIFSEMHEB']; ?></p>
        </div>
      </div>

       <!--  Fin Rajout de la reservation concerné -->
<br>
      <p><strong>
          <font size="5pt"> Informations de reservation</font>
        </strong></p>
      <br>

      <label for="">Nombre de personne : &nbsp</label>
      <input id="nombrePersonne" type="number" name="nombrePersonne" step="1" min="1" max=<?php echo $row['NBPLACEHEB']; ?> required>

    <table class="resa" >
  

    <?php 
    $SEMAINES = GETSEMAINE(25);
    $i = 0;
    while ( $row = mysqli_fetch_array($SEMAINES)){
      if ($i % 5 == 0){
        if($i > 0){
          echo "</tr>";
        }
        echo "<tr class='tr-resa'>";
      }
      echo "<td class='td-resa'>";
      $etatresa = SavoirReservation($NOHEB, $row['DATEDEBSEM']);
      echo $row['DATEDEBSEM'];
      if ( $etatresa == 0){
        echo" LIBRE ";
        echo "<input type='radio' name='date' value='".$row['DATEDEBSEM']."' required ></input>";   //  A CONTUNIER
      }
      else{
        echo " NON LIBRE";
      }
     
      echo "</td>";
      $i++;
      sleep(0.1);
    }
    ?>

    </tr>
    </table>
            
    </section>
    <br>
    <br>
    <br>
    <section class="s2">
      <p><strong>
          <font size="5pt"> Informations de payement</font>
        </strong></p>

      <label for="carte">
        <span>Type de carte : &nbsp </span>
      </label>
      <select name="carte" id="">
        <option value="Visa">Visa</option>
        <option value="Mc">Mastercard</option>
        <option value="Amex">American Express</option>
      </select>
      <br>
      <br>

      <label for="NumeroCarte">Numero : &nbsp </label>
      <strong><abbr title="required">*</abbr></strong>
      <input name="NumeroCarte" id="NumeroCarte" type="carte" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}"  />
      &nbsp
      <br>
      <br>

      <label for="date">
        <span>Validité : &nbsp </span>
        <strong><abbr title="required">*</abbr></strong>
        <em>format mm/aa</em>
      </label>
      <input type="text" id="date" name="expiration">
      <br>
      <br>
      <p align="center"><strong>
          <input name="Valider" type="submit" value="Valider">
    </section>


    <style>
      form.formulaire {
        margin: 0 auto;
        
        width: 1200px;
        height: 1400px;
        /*Encadré pour voir les limites du formulaire */
        padding: 1em;
        border: 3px solid #CCC;
        border-radius: 1em;
        border-color: #070A13;
      }

      #card {
        display: inline;
        border: 3px solid #CCC;
        border-radius: 1em;
        border-color: #070A13;
      }
    </style>



  </form>





</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include "IndicatinUtilisateur.php"; ?>