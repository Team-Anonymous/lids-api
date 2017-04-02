<?php
    $con = mysqli_connect("localhost", "root", "", "lids");
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password =mysqli_real_escape_string($con,$_POST['password']);
    $statement = mysqli_query($con, "SELECT * FROM tb_userinfo WHERE username = '$username' AND password = '$password'");
    if(mysqli_stmt_fetch($statement)){
          echo "success";
    }
    else{
        echo "authentication failed !";
    }
    
?>
