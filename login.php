<?php
    $con = mysqli_connect("localhost", "root", "", "lids");
    //$username = mysqli_real_escape_string($con,$_POST['username']);
    //$password =mysqli_real_escape_string($con,$_POST['password']);
    $username=$_POST['username'];
$password=$_POST['password'];
echo $username;
    echo $password;
    $statement = mysqli_query($con, "SELECT * FROM tb_userinfo WHERE username = '$username' AND password = '$password'");
    if(mysqli_num_rows($statement)>0){
          echo "success";
    }
    else{
        echo "authentication failed !";
    }
    
?>
