<?php
session_start();
include_once 'midleware/auth.php';
unset($_SESSION['user']);
header('location:login.php');