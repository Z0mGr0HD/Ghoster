  <nav class="navbar navbar-fixed-top navbar-expand-lg bg-secondary navbar-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa fa-user fa-fw"></i>Ghoster</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> Start</a>
          </li>
          <li class="nav-item" id="nachrichten">
            <a class="nav-link" href="#"> Nachrichten</a>
          </li>
          <li class="nav-item" id="gruppen">
            <a class="nav-link" href="#"> Gruppen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user fa-fw"></i>Profil</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Benachrichtigungen</a>
              <a class="dropdown-item" href="#">Hilfe</a>
              <a class="dropdown-item" href="#">Einstellungen</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-0 d-none d-xl-block" method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
          <input class="form-control mr-2" type="text" placeholder="Benutzername" name="username" required = "required">
          <input class="form-control mr-2" type="password" placeholder="Passwort" name="password" required = "required">
          <button class="btn btn-outline-success ml-2" type="submit" id="loginform" name="login">Anmelden</button>
        </form>
        <a href="#login" class="btn navbar-btn d-xl-none btn-outline-success" >Anmelden
          <!-- Only visible on smaller then "xl" -->
        </a>
        <a class="btn navbar-btn d-none d-xl-block" href="#register">Neu hier? Registrieren</a>
        <a href="#register" class="btn navbar-btn d-xl-none">Neu hier? Registrieren</a>
        <!-- Only visible on smaller then "xl" -->
      </div>
    </div>
  </nav>
  <div class="py-5 text-center">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 mb-4 text-secondary">Ghoster</h1>
          <p class="lead mb-5">Ghoster ist ein neuer Messenger. Neue Funktionen werden nach und nach erscheinen, da dafür erstmal ein Design erstellt werden muss. Da wir dieses Design für alle Geräte optimieren möchten, bitten wir dich um ein wenig Geduld für weitere Funktionen.
            Vielen Dank für dein Verständniss.</p>
          <a href="#register" class="btn btn-lg btn-primary mx-1">Neu hier? Registrieren</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <!-- Move Login under Background to Jump -->
    <br>
    <br>
    <br> </div>
  <div class="py-3 d-xl-none" id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Anmeldung</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-1 d-xl-none"></div>
        <div class="col-10 d-xl-none">
          <form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
              <label>Benutzername</label>
              <input type="text" class="form-control" placeholder="Benutzername" id="username" name="username" required = "required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Passwort</label>
              <input type="password" class="form-control" placeholder="Passwort" id="password" name="password" required = "required"> </div>
            <button type="submit" class="btn btn-primary" name="login">Anmelden</button>
          </form>
        </div>
        <div class="col-1 d-xl-none"></div>
      </div>
    </div>
  </div>
  <div class="pt-3" id="register">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Registrierung</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          <form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
            <div class="form-group">
              <label>Benutzername*</label>
              <input type="text" class="form-control" placeholder="Benutzername" id="registerusername" name="username" required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Vorname*</label>
              <input type="text" class="form-control" placeholder="Vorname" id="firstname" name="firstname" required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Nachname*</label>
              <input type="text" class="form-control" placeholder="Nachname" id="lastname" name="lastname"  required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>E-Mail Adresse*</label>
              <input type="text" class="form-control" placeholder="E-Mail Adresse" id="email" name="email" required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Email-Adresse wiederholen*</label>
              <input type="text" class="form-control" placeholder="Email-Adresse wiederholen" id="email2" name="email2" required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Passwort**</label>
              <input type="password" class="form-control" placeholder="Passwort" id="registerpassword" name="password" required="required"> </div>
            <div class="form-group">
              <label>Passwort wiederholen**</label>
              <input type="password" class="form-control" placeholder="Passwort wiederholen" id="password2" name="password2" required="required">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Geburtsdatum (freiwillig)</label>
              <input type="date" class="form-control" id="birthday" name="bday">
              <small class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Registrieren</button>
          </form>
        </div>
        <div class="col-1"></div>
      </div>
    </div>
  </div>
  <div class="text-left">
    <div class="container">
      <div class="row pt-3 pb-2">
        <div class="col-1"> </div>
        <div class="col-11">
          <h6>
            <b>* Pflichtfelder</b>
          </h6>
        </div>
        <div class="col-7"> </div>
      </div>
      <div class="row pb-5">
        <div class="col-1"> </div>
        <div class="col-11">
          <h6>
            <nobrake>
              <b>** Das Passwort muss folgende Kriterien enthalten:</b>
            </nobrake>
            <br>
            <br>- Mindestens 2 Groß- und Kleinbuchstaben
            <br>- 2 Zahlen (1234567890)
            <br>- 2 Sonderzeichen (!?"§%$&amp;/()=:.,-#*'`´°) </h6>
        </div>
        <div class="col-7"> </div>
      </div>
    </div>
  </div>
