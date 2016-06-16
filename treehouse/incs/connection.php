<?php

try {
$db = new PDO("mysql:host=localhost;dbname=database;port=3306","root","");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->exec("SET NAMES 'utf8'");
} catch (Exception $e) {
    echo "Unable to connect, try again ";   echo $e->getMessage();
   exit;
}