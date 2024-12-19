<?php
require 'core/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernemtemp = htmlspecialchars($_POST['usernameLogin']);

    $myDbCon = connectToMyDatabase();
    $myStmtLo = $myDbCon->prepare('select * from user where username = :username');
    $myStmtLo->execute([':username' => $usernemtemp]);
    $users = $myStmtLo->fetch();



    if ($users === false) {
        echo "Falsches Passwort1 oder Benutzername";
    } else {
        if ($_POST['passwordLogin'] === $users['password']) {
            $_SESSION["log_in_user"] = $usernemtemp;
            header('Location: solver');
        } else {

            echo "Falsches Passwort2 oder Benutzername";
        }
    }
}
