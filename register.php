<?php
ob_start();
include 'externals/header.php';

$alert = false;

if(isset($_POST['register'])){
    $users = new User();
    $users->email = $_POST['email'];
    $users->mobile= $_POST['mobile'];
    $users->username = $_POST['username'];
    $users->password = $_POST['password'];

    $user = User::show_all('register');

    foreach($user as $check){
        $check->email;
    }
    if($users->email == $check->email && $users->email ==$check->mobile){
       $alert = true;
        
    }
    else{
  
    $table = 'register';
    $fields = 'email,mobile,username,password,permission';
    $values = "'$users->email','$users->mobile','$users->username','$users->password','allowed'";
    $users->create($table,$fields,$values);
    header('location:login.php');
    }
}



?>



<div class="login-wrapper">
    <center><h4>Register Honeycomb</h4></center>
</div>

<div class="card shadow py-3">
<div class="login-form" style="margin-top: -1px;">
    <form action="register.php" method="POST">
    <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" >
            <br>
            <?php if($alert==true) : ?>
            <p style="color:red">alreay regiter this email</p>
            <?php endif;?>
        </div>
        <div class="form-group">
            <label for="">Mobile</label>
            <input type="text" name="mobile" >
            <br>
            <?php if($alert==true) : ?>
            <p style="color:red">alreay regiter this mobile</p>
            <?php endif;?>
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" >
            
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" >
        </div>
        <a href="login.php">Already register...</a>
        
        
        <div class="form-group">
            <input type="submit" name="register" value="Register" class="btn btn-primary">
        </div>
        
    </form>
    
</div>
</div>

