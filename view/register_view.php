<?php
require 'view/templates/header.php';
require 'model/register_model.php';
if (($_SERVER["REQUEST_METHOD"]) == "POST") {
    if (count($errors) > 0) { ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
<?php
    } else {
        echo "Erfolgreich registriert";
    }
} ?>


<h1>Register</h1>
<form action="" method="POST">
    <div class="firstname child-form">
        <label for="firstname">Vorname</label>
        <input type="text" id="firstname" name="firstname" placeholder="Vorname" value="<?= $firstname ?>">
    </div>
    <div class="lastname child-form">
        <label for="lastname">Nachname</label>
        <input type="text" id="lastname" name="lastname" placeholder="Nachname" value="<?= $lastname ?>">
    </div>
    <div class="username child-form">
        <label for="username">Text</label>
        <input type="text" id="username" name="username" placeholder="Username" value="<?= $username ?>">
    </div>
    <div class="email child-form">
        <label for="email">email</label>
        <input type="email" id="email" name="email" placeholder="email" value="<?= $email ?>">
    </div>
    <div class="password child-form">
        <label for="password">password</label>
        <input type="password" id="password" name="password" placeholder="Passwort">
    </div>
    <div class="confirmPassword child-form">
        <label for="confirmPassword">confirmPassword</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
    </div>
    <button class="submit" type="submit">Registrieren</button>
</form>