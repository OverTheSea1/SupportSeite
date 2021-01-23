function boot(){
  CookiePopup();
/* iframe momentan nicht benötigt document.getElementById('fram').style.display = 'none';*/
}
function FAQ(item){
  document.getElementById(item).style.display = 'block';
}
function CookieRead(){
  var Cookies = document.cookie;
  if (Cookies == '') {
    window.alert('Diese Seite hat auf ihrem Endgerät keine Cookies gespeichert');
  }else {
    window.alert('Es sind momentan folgende Cookies auf ihrem Endgerät gespeichert: ' + document.cookie);
  }
}
function setC(){
var now = new Date();
    now.setMonth( now.getMonth() + 1 );
    document.cookie = "name=CookieTrue; expires=" + now.toUTCString() + ";" + "path:/;"
}
function readC(){
  window.alert(document.cookie);
}
function delC(){
  var now = new Date();
      now.setMonth( now.getMonth());
  document.cookie = "name=CookieTrue; expires= Thu, 01 Jan 1970 00:00:00 "
}
function CookiePopup(){
  if (document.cookie=="name=CookieTrue") {

  }else {
      document.getElementById('fram').style.display = 'none';
    document.getElementById('reload').style.display = 'none';
    document.getElementById('checker').style.display = 'none';
  document.getElementById("light").style.display = "block";
  document.getElementById("fade").style.display = "block";
}
}
function closeCP(){
  document.getElementById('light').style.display='none';
  document.getElementById('fade').style.display='none';
}
function AccC(){
  setC();
  closeCP();
  boot();
}
function DecC(){
  delC();
  closeCP();
}

function Auswahl(device){
  document.getElementById('cont').style.display = "block";
  window.scrollTo(0,document.body.scrollHeight);
  switch (device) {
    case 'iPad':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt1').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    case 'Windows':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt2').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    case 'MacOS':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt3').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    case 'moodle':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt4').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    case 'iServ':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt5').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    case 'support':
    document.getElementById('opt0').selected = false;
    document.getElementById('opt6').selected = true;
    document.getElementById('form').style.display = "block";
      break;
    default: Fehlermeldung('js:55');

  }

}

function rmDown(){
  document.getElementById('down').style.visibility = 'hidden';
}

function Fehlermeldung(Fehlercode){
    document.getElementById('onError').style.display = 'none';
    document.getElementById('Error').style.display = 'block';
    document.getElementById('refresh_error').innerHTML = Fehlercode;
  }
function checkbox(){

  /*  document.getElementById('myCheck').checked = "true"; */
     var check = document.getElementById('IconS').checked;

     if (check) {
       document.getElementById('emojis').style.display = 'block';
       document.getElementById('noEmojis').style.display = 'none';
     }else{
       document.getElementById('emojis').style.display = 'none';
       document.getElementById('noEmojis').style.display = 'block';
     }
  }
  function settings(){
    window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
    document.getElementById('settings').style.display = 'block';
    document.getElementById('settings_off').style.display = 'none';
    document.getElementById('settings_on').style.display = 'block';

}
  function settingsOff(){
    document.getElementById('settings').style.display = 'none';
    document.getElementById('settings_off').style.display = 'block';
    document.getElementById('settings_on').style.display = 'none';
  }
