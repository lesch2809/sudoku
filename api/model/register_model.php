<?php
require 'core/database.php';
$myDbCon = connectToMyDatabase();
$error_list = [
    "Bitte geben Sie Ihren Vornamen ein.",
    "Bitte geben Sie Ihren Nachnamen ein.",
    "Bitte geben Sie Ihren Benutzernamen ein.",
    "Bitte geben Sie Ihre E-Mail-Adresse ein.",
    "Bitte geben Sie eine gültige E-Mail-Adresse ein.",
    "Bitte geben Sie ein Passwort ein.",
    "Bitte bestätigen Sie Ihr Passwort.",
    "Die Passwörter stimmen nicht überein."
];

$errors = [];
$firstname = ($_POST['firstname']) ?? '';
$lastname = ($_POST['lastname']) ?? '';
$username = ($_POST['username']) ?? '';
$email = ($_POST['email']) ?? '';
$password = ($_POST['password']) ?? '';
$confirmPassword = ($_POST['confirmPassword']) ?? '';

if (($_SERVER["REQUEST_METHOD"]) == "POST") {
    if (($_POST['firstname']) == '') {
        $errors[] = $error_list[0];
        $firstname = '';
    }
    if (($_POST['lastname']) == '') {
        $errors[] = $error_list[1];
        $lastname = '';
    }
    if (($_POST['username']) == '') {
        $errors[] = $error_list[2];
        $username = '';
    }
    if (($_POST['email']) == '') {
        $errors[] = $error_list[3];
        $email = '';
    } elseif (str_contains($_POST['email'], '@') == false) {
        $errors[] = $error_list[4];
        $email = '';
    }
    if (($_POST['password']) == '') {
        $errors[] = $error_list[5];
        $password = '';
    }
    if (($_POST['confirmPassword']) == '') {
        $errors[] = $error_list[6];
        $confirmPassword = '';
    }
    if (($_POST['password']) !== ($_POST['confirmPassword'])) {
        $errors[] = $error_list[7];
        $confirmPassword = '';
    }
    if (count($errors) == 0) {

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']); 


        $myDbCon = connectToMyDatabase();
        $ins = $myDbCon->prepare("INSERT INTO `user` (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)");
        $ins->bindParam(':firstname', $firstname);
        $ins->bindParam(':lastname', $lastname);
        $ins->bindParam(':username', $username);
        $ins->bindParam(':email', $email);
        $ins->bindParam(':password', $password);
        $ins->execute();

        $firstname = '';
        $lastname = '';
        $username = '';
        $email = '';
        $password = '';
        $confirmPassword = '';
    }
}
