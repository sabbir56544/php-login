<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: login.php');
    exit;
}

?>


<?php require 'partials/_navbar.php' ?>


<?php require 'partials/_slider.php' ?>


<h3 class="text-center mt-4">ALL Views</h3>


<?php require './partials/_body.php' ?>