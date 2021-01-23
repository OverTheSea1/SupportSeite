<?php
session_start();
if ($_SESSION["Pannel"]== true) {
  echo "<br><h1 class='center'>Dashboard</h1>";


  include '../resources/dblogin.php';




  $con = new mysqli($servername, $user, $password, $db);
  if ($con->connect_error) {
    die('Fehler '.$con->connect_error);
  }

    $count = 0;

    $sql_name = "SELECT * FROM Anfragen";
    $res = $con->query($sql_name);
    while ($name = $res->fetch_assoc()) {
      if ($name["Status"]=="free") {
        echo $name["Status"];
      echo
      "<table class='solidthin' style='width: 100%;'>
        <tr>
          <td class='solidthin'>$name[Name]</td>
          <td>$name[Nachricht]</td>
        </tr>
        <tr>
          <td class='solidthin'><a href='mailto:$name[Mail]'>$name[Mail]</a></td><td class='solidthin'>$name[Thema]</td><td style='width: 15%' class='solidthin'>$name[Zeit]</td><td> <form action='claim.php' method='post'><button type='submit' name='button' value='$name[ID]'>Claim</button></form> </td>
        </tr>
        <br>
      </table>
      <br><br><br>
      ";
    }else if ($name["Status"]=="claimed von ".$_SESSION['user']){
      echo $name["Status"];
      echo
      "<table class='solidthin' style='background-color: orange; width: 100%;'>
        <tr>
          <td class='solidthin'>$name[Name]</td>
          <td>$name[Nachricht]</td>
        </tr>
        <tr>
          <td class='solidthin'><a href=''>$name[Mail]</a><form action='sendmail/index.php' method='post'>
            <input style='display: none;' type='text' name='name' value='$name[Name]'>
            <input style='display: none;' type='text' name='mail' value='$name[Mail]'>
            <input type='submit' name='' value='Antworten'>
          </form></td><td class='solidthin'>$name[Thema]</td><td style='width: 15%' class='solidthin'>$name[Zeit]</td><td> <form action='release.php' method='post'><button type='submit' name='button' value='$name[ID]'>release</button></form><form action='delete.php' method='post'><button type='submit' name='button' value='$name[ID]'>delete</button></form> </td>
        </tr>
        <br>
      </table>
      <br><br><br>";
    }else if($name["Status"] == "deleted"){
      $count += 1;
    }else {
      if ($_SESSION["user"] == "Admin") {
        $admin = "<td> <form action='release.php' method='post'><button type='submit' name='button' value='$name[ID]'>release</button></form><form action='delete.php' method='post'><button type='submit' name='button' value='$name[ID]'>delete</button></form> </td>";
        $admin2 = "<a href='mailto:$name[Mail]'>$name[Mail]</a>";
      }else {
        $admin = "";
        $admin2 = "<a href=''>***claimed***</a>";
      }

      echo $name["Status"];
      echo
      "<table class='solidthin' style='background-color: red; width: 100%;'>
        <tr>
          <td class='solidthin'>$name[Name]</td>
          <td>$name[Nachricht]</td>
        </tr>
        <tr>
          <td class='solidthin'>$admin2</td><td class='solidthin'>$name[Thema]</td><td style='width: 15%' class='solidthin'>$name[Zeit]</td><td> </td>$admin
        </tr>
        <br>
      </table>
      <br><br><br>";

  }

}


echo $count . " finished request´s";
}
 ?>
