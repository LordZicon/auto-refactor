<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="../css/cssLogin.css" media="screen">
</head>

<body>
  <div class="wrapper">
    <div class="login">
      <?php if (!empty($error)): ?>
      <p class="error"><?php echo $error ?></p>
      <?php endif ?>
      <h1>Admin login</h1>
      <form action="" method="post" name="login_form" id="login_form" class="login_form">
        <input name="gebruikersnaam" id="gebruikersnaam" type="text" class="form_field" tabindex="1">
        <input name="wachtwoord" id="wachtwoord" type="password" class="form_field"  tabindex="2">
        <input name="login_button" type="submit" class="login_button" id="login_button" tabindex="3">
      </form>
      <p><a href="reset_wachtwoord.php" title="Wachtwoord vergeten">Wachtwoord vergeten?</a></p>
    </div>
  </div>
</body>
</html>