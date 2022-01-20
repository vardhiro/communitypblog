<?php
session_start();
include("define.php");
if(isset($_POST['name'])&&isset($_POST['password'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $conn = mysqli_connect(host,user,password,db);
    $s = "select * from user where username='$name' and password='$password'";
    $q = mysqli_query($conn,$s);
    $q2 = mysqli_num_rows($q);
    if($q2>0){
        $_SESSION['name']=$name;
        $_SESSION['password']=$password;
        header("Location: index.php");
    }else{
        $_SESSION['t'] = "lf";
        header("Location: login.php");
    }
}
?>