<?php
require_once 'PDO.php';

function check_login($email,$password){
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
   return pdo_query_one($sql);
}

function check_sigin($email){
    $sql = "SELECT email FROM user WHERE email='$email'";
    return pdo_query_one($sql);
}
?>