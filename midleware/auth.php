<?php
if (empty($_SESSION['user'])) {
    # code...
    header('location:login.php');
}
?>