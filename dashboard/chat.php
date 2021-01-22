<?php
  $servername = 'localhost';
  $user = '';
  $password = '';
  $db = '';

  $con = new mysqli($servername, $user, $password, $db);
  if ($con->connect_error) {
    die("Fehler".$con->connect_error);
  }
    $color = "rgba(255, 255, 255, 0.3";
    $sql = "SELECT * FROM Chat2";
    $res = $con->query($sql);
    while ($m = $res->fetch_assoc()) {
      if ($color == "rgba(255, 255, 255, 0.1") {
        $color = "rgba(0, 0, 0, 0.1)";
      }else {
        $color = "rgba(255, 255, 255, 0.3";
      }
      echo "<span title='$m[Time]'>". $m["Nutzer"] . ": <span style='background-color: $color;'>" . $m['Message'] . "</span></span>" . "<br>";
    }
    echo "<br>";
 ?>
