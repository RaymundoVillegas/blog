<?php
require_once(__DIR__ . "/../model/config.php");

$query = $_SESSION["connection"]->query("CREATE TABLE posts ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY (id))");
//this line talks about query succesfully created table for the post it will echo out the following line.
if($query){
    echo "<p>Succesfully created table: posts</p>";
}
//But if query dosnt make the table it will echo out the following line letting you know that it failed.
 else{
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}
//Creates table for username, email, password etc.
 $query = $_SESSION["connection"]->query("CREATE TABLE user("
         ."id int(11) NOT NULL AUTO_INCREMENT,"
         ."username varchar(30) NOT NULL,"
         . "email varchar(50)NOT NULL,"
         . "password char(128) NOT NULL,"
         ."salt char(128) NOT NULL,"
         ."PRIMARY KEY (id))");
 //shows up when table is created
 if($query){
     echo "<p>Successfully created table: users</p>";
 }
 else{
     echo"<p>" . $_SESSION["connection"]->error. "</p>";
 }