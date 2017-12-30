<?php
$server = "localhost";
$user = "root";
$password = "oaelotug";
$dbName = "projeferias_2018_01";
$conn = mysqli_connect($server, $user, $password, $dbName);
$db = mysqli_select_db($conn,$dbName);

if ($db){
    echo 'sucesso';
}
?>