<?php
ob_start();
 include "externals/sidebar.php"; 
 include 'externals/header.php'; 
 include "externals/init.php";?>


<?php 

$users = User::show_all('register');

if(isset($_GET['delete'])){
    $delete_user = new User();
    $delete_user->id = $_GET['delete'];
    $delete_user->delete('register');
    header('location:all_users.php');
   

}

?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Bar Chart -->
<div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">View All Users</h6>
       </div>
       <div class="card-body">
       
       <table class="table table-bordered table-hover">
             <thead >
                 <tr>
                     <th>Id</th>
                     <th>User Email</th>
                     <th>User Mobile</th>
                     <th>Username</th>
                     <th>Password</th>
                     <th>Permission</th>
                     <th>Delete</th>
                 </tr>
             </thead>
             <tbody>
             <?php foreach($users as $user):?>
                <tr>
                    <td><?php echo $user->id?></td>
                    <td><?php echo $user->email;?></td> 
                    <td><?php echo $user->mobile;?></td>
                    <td><?php echo $user->username;?></td>  
                    <td><?php echo $user->password;?></td> 
                    <td><?php echo $user->permission;?></td> 
                    <td><a href="all_users.php?delete=<?php echo $user->id;?>">Delete</a></td>
                    
                </tr>
                <?php endforeach;?>
          
             </tbody>
         </table>
         </div>
     </div>
   </div>


  