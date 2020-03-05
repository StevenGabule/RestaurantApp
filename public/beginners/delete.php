<?php
require 'config.php';
$id = $_GET['id'];
global $connect;

$q = "DELETE FROM  TBLPersons WHERE user_id = $id";

if ($connect->exec($q)) {
    $_SESSION['success'] = 'You successfully deleted it!';
    header('Location: index.php');
} else {
    header('Location: index.php');
}
