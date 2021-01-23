<?php
session_start();
if (empty($_POST['msg']) || strpbrk($_POST['msg'], '1234567890abcdefghijklmnopqrstuvw-.,´ß?!')==false ) {
  die("Sie müssen etwas eingeben");
}else {
  $nachricht = htmlspecialchars(trim($_POST['msg']));

include '../resources/dblogin.php';

  $con = new mysqli($servername, $user, $password, $db);
  if ($con->connect_error) {
    die("Fehler".$con->connect_error);
  }
  $sql = $con->prepare("INSERT INTO Chat2 (Message, Nutzer) VALUES (? , ?)");
  $sql->bind_param("ss", $nachricht, $_SESSION["user"]);
  $sql->execute();
  header('Location: index.php');
}
?>
