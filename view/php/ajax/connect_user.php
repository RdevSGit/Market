<?php

include_once("../../../config/connexion/connexion.php");

$email = $_POST["email"];
$password = $_POST["password"];


$verify_user = $bdd->prepare("SELECT id ,email , password, vendor FROM users WHERE email = ?");
$verify_user->execute([$email]);
$user = $verify_user->fetch();

if (!empty($user)) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['user'] = $user['vendor'];
        echo 'connected';
    } else {
        echo 'Mots ou passe ou email incorrect';
    }
} else {
    echo 'Mots ou passe ou email incorrect';
}
