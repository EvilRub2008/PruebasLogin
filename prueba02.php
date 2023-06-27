<form>
  <div class="form-group">
    <label for="username">Nombre de usuario</label>
    <input type="text" class="form-control" id="username" placeholder="Ingrese su nombre de usuario">
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar sesión</button>
  <button type="button" class="btn btn-google" id="google-login">Iniciar sesión con Google</button>
</form>

<div class="alert alert-danger" role="alert" id="error-message">
  Las credenciales ingresadas son incorrectas.
</div>

<div class="alert alert-success" role="alert" id="welcome-message">
  Bienvenido a tu cuenta, <span id="user-name"></span>!
</div>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="TU_CLIENT_ID">

<script>
  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var name = profile.getName();
    var imageUrl = profile.getImageUrl();
    var email = profile.getEmail();
    document.getElementById("user-name").innerHTML = name;
    document.getElementById("welcome-message").style.display = "block";
    document.getElementById("error-message").style.display = "none";
  }

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('Usuario desconectado.');
    });
  }

  function onLoad() {
    gapi.load('auth2', function () {
      gapi.auth2.init({
        client_id: 'TU_CLIENT_ID',
        scope: 'email'
      });
    });
  }

  document.getElementById("google-login").addEventListener("click", function () {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signIn().then(onSignIn);
  });
</script>
