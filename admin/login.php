<?php
session_start();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
form{
    margin-top: 20px;
    padding: 30px;
    background-color: ivory;
    width: 25%;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
}
@media(max-width:800px){
    form{
        width:95%;
    }
}
form input{
    width: 75%;
    border-radius: 10px;
    color: grey;
}
form button{
    border: 0;
    border-radius: 5px;
    padding: 15px;
    background-color: orange; 
    font-size: 1.2rem;
    color:white;
}
form h1{
    color: get_resource_type;
}
</style>
<?php
if(!isset($_SESSION['name'])||!isset($_SESSION['password'])){
if(isset($_SESSION['t'])&&$_SESSION['t']="lf"){
    echo"<script>alert('Incorrect username or password')</script>";
}
?>
<center>
<form action="valid.php" method="post">
<h1>LOGIN</h1>
<input type="text" name="name" placeholder="Username"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<button>Login</button>
</form>
</center>
<?php
}else{
    echo"<script>location.href='index.php'</script>";
}
?>