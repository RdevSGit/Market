<?php

include_once("../../../config/connexion/connexion.php");

$email = $_POST['email'];
$password = $_POST['password'];
$hash_bcrypt = password_hash($password, PASSWORD_DEFAULT);

$email_verify = $bdd->prepare("SELECT * FROM  users WHERE email = ?");
$email_verify->execute([$email]);
$result = $email_verify->rowCount();

if (!empty($result)) {
    echo "Vous possédez déjà un compte";
} else {
    $query = $bdd->prepare("INSERT INTO users (email, password) VALUES (?,?) ");
    $query->execute([$email, $hash_bcrypt]);
    echo "Vous etes désormais inscrit";
}
