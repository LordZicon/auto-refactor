<div id="content">
  
  <header id="header">
    <h2>Add New Admin User</h2>
  </header>

  <form method="post" action="">
    <label><strong>Naam</strong></label>
    <input type="text" name="naam" id="naam" class="loginfield"><br><br>

    <label><strong>Email</strong></label>
    <input type="text" name="email" id="email" class="loginfield"><br><br>

    <label><strong>Gebruikersnaam</strong></label>
    <input type="text" name="gebruikersnaam" id="gebruikersnaam" class="loginfield"><br><br>

    <label><strong>Wachtwoord</strong></label>
    <input type="password" name="wachtwoord" id="wachtwoord"  class="loginfield"><br><br>

    <label><strong>Role</strong></label>
    <select name="role" id="role">
    <?php foreach ($roles as $role): ?>
      <option value="<?php echo $role['role_id'] ?>"><?php echo $role['role'] ?></option>
    <?php endforeach; ?>
    </select>

    <p><br /><input type="submit" name="submit" class="button" value="login" /></p>
  </form>       
</div>