
 <?php
   session_start();
   if (!$_SESSION["Pannel"]==true) {
     die("Du hast keine Berechtigung" . header('Location: index.php'));
   }
   $servername = 'localhost';
   $user = '';
   $password = '';
   $db = '';


   $con = new mysqli($servername, $user, $password, $db);
   if ($con->connect_error) {
     die('Fehler '.$con->connect_error);
   }

    $status = "deleted";
    $id = htmlspecialchars(trim($_POST["button"]));
    $sql = $con->prepare("UPDATE Anfragen SET Status = ? WHERE ID = ?");
    $sql->bind_param("ss", $status, $id);
    $sql->execute();
    header('Location: index.php');

  ?>
