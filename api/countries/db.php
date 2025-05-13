<?php

$host = "fdb1028.awardspace.net";
$dbname = "4633613_api1";
$username = "4633613_api1";
$password = "5XW@12aa34";





try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
