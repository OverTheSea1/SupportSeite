<?php session_start();
  if ($_SESSION["Pannel"] != true) {
    die(header('Location: ../login'));
  }
?>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Support Dashboard</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body onload="Boot()">
  <div id="head">  <a class="headE" href="/">Home</a> <span>    </span> <a class="headE" href="/login/logut.php">Abmelden</a></div>
  <div id="dash">

  </div>
   <br><br><br><br><br><br><br><br><br>
   <div id="chat" onload="loadDoc()">
     <button onclick="Chatoff()" id="minimize">Ausblenden</button>
     <h2 style="text-align:center">Supporter Chat</h2>
     <div id="chatfield">

     </div>
     <form action="send.php" method="post">
     <input id="inputfield" type="text" name="msg" maxlength="100" size="40" placeholder="Geben sie ihre Nachricht hier ein">
     <input id="submit" type="submit" placeholder="Senden">
     </form>
   </div>
   <button id="chatonButton" onclick="Chaton()" name="button">Chat anschalten</button>
  </body>
</html>
<script type="text/javascript">

  setInterval(function() {
    var objDiv = document.getElementById("chat");
    objDiv.scrollTop = objDiv.scrollHeight;
    loadDoc();
    loadDash();
}, 1000);

function Boot(){
  loadDoc();
  loadDash();
  a = document.cookie;
  cookiename = a.substr(0,a.search('='));
  cookiewert = a.substr(a.search('=')+1,a.search(';'));
if(document.cookie.includes('Chat=false')){
  document.getElementById('chat').style.display = "none";
  document.getElementById('chatonButton').style.display = "block";
}
}

    function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("chatfield").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "chat.php", true);
    xhttp.send();
    }
    function loadDash() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("dash").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "dash.php", true);
    xhttp.send();
    }
    function Inputtest() {
      var value = document.activeElement.id;
      if (value != "inputfield") {
        window.location.href = window.location.href;
      }
    }
    function Chatoff() {
      document.getElementById('chat').style.display = "none";
      document.getElementById('chatonButton').style.display = "block";
      var now = new Date();
      now.setMonth( now.getMonth() + 1 );
      document.cookie = "Chat=false; expires=" + now.toUTCString() + ";" + "path:/;"
    }
    function Chaton(){
      document.getElementById('chat').style.display = "block";
      document.getElementById('chatonButton').style.display = "none";
      var now = new Date();
      now.setMonth( now.getMonth());
      document.cookie = "Chat=false; expires=" + now.toUTCString() + ";" + "path:/;";
    }
</script>
