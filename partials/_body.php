<?php
include 'partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['cat_name'];
                $id = $row['cat_id'];
                $name = $row['cat_name'];
                $disc = $row['description'];
                echo '<div class="col-lg-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/200/200.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'. $name .'</h5>
                        <p class="card-text">'. $disc .'</p>
                        <a href="detail.php?catid='. $id .' " class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>';
            }

            ?>

        </div>
    </div>

</body>

</html>