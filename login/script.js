function login_register() {
  if (document.getElementById('reg').style.display == 'block') {
    document.getElementById('reg').style.display = 'none';
    document.getElementById('log').style.display = 'block';
  }else {
    document.getElementById('reg').style.display = 'block';
    document.getElementById('log').style.display = 'none';
  }
}
