<?php
require "view/templates/header.php";
require 'model/login_model.php';
?>

<form action="" method="POST">
    <div class="usernameLogin child-form">
        <label for="usernameLogin">Username</label>
        <input class="form-control" type="text" id="usernameLogin" name="usernameLogin">
    </div>
    <div class="passwordLogin child-form">
        <label for="passwordLogin">Passwort</label>
        <input class="form-control" type="password" id="passwordLogin" name="passwordLogin">
    </div>
    <button class="submit" type="submit">Anmelden</button>
    <a href="register">Noch kein Account? Erstelle jetzt einen!</a>
</form>