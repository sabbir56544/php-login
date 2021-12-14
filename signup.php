<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    include 'partials/_dbconnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        if(strlen($password) <= 6){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Password need to be at least 8 characters.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
            $sql = "INSERT INTO `users` (`name`, `email`, `password`, `dt`) VALUES ('$name', '$email', '$password', current_timestamp());";
            $result = mysqli_query($conn, $sql);
           
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You should now login.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header("location: login.php");
            }
            
            else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Your data is invalid.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header("location: signup.php");
            }
        }
  
    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Your password is not matched.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}

?>

<?php require 'partials/_navbar.php' ?>


<div class="container">
    <h2 class="text-center mt-4">Signup Page</h2>
    <form method="post" action="/contact/signup.php">
    <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
