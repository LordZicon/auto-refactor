<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/cssLogin.css" media="screen">

</head>

<body>
<div class="wrapper">
  <div class="login">
    <?php if (!empty($_GET['message'])): ?>
    <p class="error"><?php echo $_GET['message']?></p>
    <?php endif ?>
    <h1>Reset wachtwoord</h1>
    <form action="includes/emailcheck_post.php" method="post" name="login_form" id="login_form" class="login_form">
        <input name="email" id="email" type="text" class="form_field" tabindex="1">
        <input name="login_button" type="submit" class="login_button" id="login_button" tabindex="2">
    </form>
  </div>
</div>
</body>
</html>