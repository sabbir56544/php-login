<?php require 'partials/_navbar.php'
?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/_dbconnect.php';
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You should now login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        header("location: welcome.php");
    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Your data is invalid.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

}

?>

<div class="container">
    <h2 class="text-center mt-4">Login Page</h2>
    <form method="post" action="/contact/login.php">
    <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
      
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
