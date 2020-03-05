<?php
session_start();
$serverName = "DESKTOP-6HKMAB1\FLORDELYN2019";
$connectionOptions = array(
    'Database' => 'valencianos',
    'Uid' => 'sa',
    'PWD' => 'flordelyn2019');
$connect = new PDO("sqlsrv:Server=$serverName;Database=valencianos", 'sa', 'flordelyn2019');
$connect->setAttribute(3, 2);

