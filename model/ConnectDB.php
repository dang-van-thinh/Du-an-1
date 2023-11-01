<?php
function connect(){
    $conn = new PDO("mysql:host=localhost;dbname=sport_da1","root","");
    return $conn;
}
?>