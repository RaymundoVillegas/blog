<?php
require_once(__DIR__ . "/../model/config.php");

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);

$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post' "); 
//This shows up if you succesfully insert post title
if($query){
    echo "<p>successfully inserted post: $title</p>";
}
//if not it will show up as an error
else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}

