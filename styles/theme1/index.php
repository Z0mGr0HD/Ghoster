<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="styles/theme1/theme.css" type="text/css">
  <title>Theme1</title>
</head>

<body>
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
            <a class="nav-link" href="#messages"> Nachrichten</a>
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
		  				<?php
						if($loggedin) {
						?>
        <form method="POST">
            <input type="submit" value="logout" name="logout" />
        </form>
<?php						
						}
						
		 if($loggedin == false) {
		 ?>
        <form class="form-inline my-2 my-0 d-none d-xl-block" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
          <input class="form-control mr-2" type="text" placeholder="Benutzername" name="nickname">
          <input class="form-control mr-2" type="password" placeholder="Passwort" name="password">
          <button class="btn btn-outline-success ml-2" type="submit" id="loginform" name="login">Anmelden</button>
        </form>
        <a href="#login" class="btn navbar-btn d-xl-none btn-outline-success">Anmelden
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
  <div class="py-5" >
    <!-- Move Login under Background to Jump -->
    <br><br><br>
  </div>
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
          <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
              <label>Benutzername</label>
              <input type="text" class="form-control" placeholder="Benutzername" id="username" name="nickname" / >
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Passwort</label>
              <input type="password" class="form-control" placeholder="Passwort" id="password" name="password" /> </div>
            <button type="submit" class="btn btn-primary" name="login" >Anmelden</button>
          </form>
		  <?php 
		  }
		  ?>
        </div>
        <div class="col-1 d-xl-none"></div>
      </div>
    </div>
  </div>
  		<?php 
		if($showFormular && $loggedin == false) {
		?>
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

          <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
              <label>Benutzername*</label>
              <input type="text" class="form-control" placeholder="Benutzername" id="username" required="required" name="username" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Vorname*</label>
              <input type="text" class="form-control" placeholder="Vorname" id="firstname" required="required" name="firstname" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Nachname*</label>
              <input type="text" class="form-control" placeholder="Nachname" id="lastname" required="required" name="lastname" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>E-Mail Adresse*</label>
              <input type="email" class="form-control" placeholder="E-Mail Adresse" id="email" required="required" name="email" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Email-Adresse wiederholen*</label>
              <input type="email" class="form-control" placeholder="Email-Adresse wiederholen" id="email2" required="required" name="email2" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Passwort**</label>
              <input type="password" class="form-control" placeholder="Passwort" id="password" required="required" name="password" /> </div>
            <div class="form-group">
              <label>Passwort wiederholen**</label>
              <input type="password" class="form-control" placeholder="Passwort wiederholen" id="password2" required="required" name="password2" />
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Geburtsdatum (freiwillig)</label>
              <input type="date" class="form-control" placeholder="Geburtsdatum" id="birthday" name="bday" />
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
  		  <?php
		}
		  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
