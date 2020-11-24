<?php
require 'includes/init.php';

//if user is making a sign up request
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $result = $user_obj->signUp($_POST['username'], $_POST['email'],$_POST['password']);

    $email_result = $email_obj->sendRegistrationEmail($_POST['username'], $_POST['email']);
}

//user logged in already
if(isset($_SESSION['email']) ){
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-eqiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
<div class="profile_container">
<div class="inner_profile">
    <img src="logo.jpeg" alt="Eazy Roommate" align="left" width="120" height="120">
</div>
<div class="main_container login_signup_container">



    <h1>Sign Up</h1>
    <form action="" method="POST" novalidate>
        <label for="username">Full Name</label>
        <input type="text" id="username" name="username" spellcheck="false" placeholder="Enter your full name" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" spellcheck=

        "false" placeholder="Enter your email address" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <input type="submit" name="sendMail" value="Sign Up">
        <a href="index.php" class="form_link">Login</a>
    </form>
    <div>
        <?php
        if(isset($email_result['errorMessage'])){
            echo '<p class="errorMsg">'.$email_result['errorMessage'].'</p>';
        }
        if(isset($email_result['successMessage'])){
            echo '<p class="successMsg">'.$email_result['successMessage'].'</p>';
        }
        ?>
    </div>
</div>
</div>
</body>
</html>
