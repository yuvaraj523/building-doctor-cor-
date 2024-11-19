<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION['username'] = $username;
        header("Location:add-quotations.php "); 
        exit();
    } else {

        echo "<script>
            alert('Invalid username or password!');
        </script>";
    }
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/layout.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>


</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2 logo-color" src="assets/img/bd-logo.png" alt="Logo">
                <img class="img-fluid logo-light mb-2" src="assets/img/bd-logo.png" alt="Logo">
                <div class="loginbox mt-5">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form method="POST" action="">
                                <div class="input-block mb-3">
                                    <label class="form-control-label">Email Address</label>
                                    <input type="email" class="form-control" name="username">
                                </div>
                                <div class="input-block mb-3">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>


                                <button class="btn btn-lg  btn-primary w-100" type="submit">Login</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="assets/js/jquery-3.7.1.min.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>

    <script src="assets/js/theme-settings.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>
    <script src="assets/js/greedynav.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>

    <script src="assets/js/script.js" type="bbbb2767a2b6ac6ebdbd5d3b-text/javascript"></script>
    <script src="./cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="bbbb2767a2b6ac6ebdbd5d3b-|49" defer></script>

</body>


</html>