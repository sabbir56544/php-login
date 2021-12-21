<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
    header("location: login.php");
}

include 'partials/_dbconnect.php';
include 'partials/_navbar.php';

if ($loggedin) {
    $id = $_GET['qid'];
    $sql = "SELECT * FROM `questions` WHERE q_id = $id;";
  
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Could not connect" . mysqli_connect_error());
        exit();
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['q_id'];
            $title = $row['q_title'];
            $desc = $row['q_desc'];
            $q_user_id = $row['q_user_id'];
            // echo '<h2 class="text-center">FAQ Questions</h2>';
            echo '<div class="container my-4">
            <div class="jumbotron">
                <h1 class="display-4">' . $title . '</h1>
                <p class="lead"></p>
                <hr class="my-4">
                <p>'. $desc . '</p>
                <p>posted by - '.$q_user_id.'</p>
            </div>
        </div>';
        }
    }

}

?>

