<?php
require_once(__DIR__ . "/../model/config.php");

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";

$hashedPassword = crypt($password, $salt);

$query = $_SESSION["connection"]->query("INSERT INTO user SET "
        . "email = '$email', "
        . "username = '$username', "
        . "password = '$hashedPassword', "
        . "salt = '$salt'");
//This will show up if succesfully created username
if($query){
    echo "Succesfully created user:$username";
}
//if not it will show up as an error
else{
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}