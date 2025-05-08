<?php

$host = "sql3.freesqldatabase.com:3306";
$dbname = "sql3777600";
$username = "sql3777600";
$password = "ZJeg2lEFBTZ";





try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
