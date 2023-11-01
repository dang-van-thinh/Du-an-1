<?php
require_once 'ConnectDB.php';
function pdo_query($sql){
    $conn = connect();
    $stmt = $conn->prepare($sql);
    return $stmt->fetchAll();
}
function pdo_excute($sql){
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function pdo_query_one($sql){
    $conn = connect();
    $stmt = $conn->prepare($sql);
    return $stmt->fetch();
}
function pdo_query_value($sql){
    $conn = connect();
    $stmt = $conn->prepare($sql);
    return $stmt->fetch()[0];
}
?>