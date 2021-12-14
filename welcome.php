<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: login.php');
    exit;
}

?>

<?php require 'partials/_navbar.php' ?>


<div class="container">
    <h2 class="text-center mt-4">
    Welcome to the 
    <?php 
        echo $_SESSION['name'];
    ?>

    </h2>
    
</div>
