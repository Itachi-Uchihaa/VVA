<?php session_start();
if (isset($_SESSION["login"])) {
   session_destroy();
   echo "L'utilisateur " . $_SESSION['login'] . " a été déconnecté !";
   header('Location: http://localhost/zola/projetResa2/Accueil.php');
}
else {
   echo "Aucun utilisateur est connecté !";

}