<?php

$servername = "localhost";
$username = "id889232_test";
$password = "testing";
$database = "id889232_test";
$staff_tbl = "staff";
$leave_tbl = "leave_record";
$errmsg_arr = array();


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
 echo 'ERROR: ' . $e->getMessage();
}
?>