<?php
ob_start();
include 'externals/header.php';

?>
<?php
    if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $table = 'register';
    $fields = "username='$username',password='$password'";

    $user_found = User::verify_user($username,$password);
    
    if($user_found){
        $session = new Session();
         $session->login_condition($user_found);
         header('location:index.php');
    }
    else{
        echo "please register";
    }
    }

?>

<div class="login-wrapper">
    <center><h4>Login Honeycomb</h4></center>
</div>

<div class="card shadow py-3">
<div class="login-form">
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" >
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" >
        </div>
        <a href="">forget password!</a>|
        <a href="register.php">You have not Register?</a>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
            
        </div>
        
    </form>
   
    
    
</div>
</div>

