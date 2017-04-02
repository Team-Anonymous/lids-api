<?php
    $con = mysqli_connect("localhost", "root", "", "lids");
    
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password =mysqli_real_escape_string($con,$_POST['password']);
    
    $statement = mysqli_prepare($con, "SELECT * FROM tb_userinfo WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
  
    if(mysqli_stmt_fetch($statement)){
          echo "success";
    }
    else{
        echo "authentication failed !";
    }
    
?>
