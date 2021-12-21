<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
    header("location: login.php");
}

include 'partials/_navbar.php';


include 'partials/_dbconnect.php';
$id = $_GET['catid'];
$sql = "SELECT * FROM `category` WHERE cat_id =$id;";
// $sql = "SELECT * FROM `category` WHERE cat_id = $id;";
$result = mysqli_query($conn, $sql);
$noQuestion = true;

if (!$result) {
    die("Could not connect" . mysqli_connect_error());
    exit();
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['cat_id'];
        $name = $row['cat_name'];
        $disc = $row['description'];
        if ($loggedin) {
            echo '<div class="container my-4">
                <div class="jumbotron">
                    <h1 class="display-4">' . $name . '!</h1>
                    <p class="lead">' . $disc . '</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
            </div>';
        }
    }
}

?>

<?php

$id = $_GET['catid'];
$sql = "SELECT * FROM `questions` WHERE q_cat_id = $id;";
$result = mysqli_query($conn, $sql);
$noResult = true;

while ($row = mysqli_fetch_array($result)) {
    $id = $row['q_id'];
    $title = $row['q_title'];
    $desc = $row['q_desc'];
    $noResult = false;
    echo '<h2 class="text-center">FAQ Questions</h2>';

    echo
    '<div class="container">
        <div class="container">
            <div class="media my-3">
                <img src="images/p.jpg" width="34px" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><a href="question.php?qid=' . $id . '">' . $title . '</a></h5>
                    <p>' . $desc . '</p>
                </div>
            </div>
        </div>
    </div>';
}

// echo var_dump($noResult);
if ($noResult == true) {
    echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-6">No Questions Found</p>
                <p class="lead"> Be the first person to ask a question</p>
            </div>
         </div> ';
}



?>



