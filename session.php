<?php
require_once "db.php"
session_start();
$_SESSION
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}