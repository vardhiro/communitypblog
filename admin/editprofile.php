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
    color: grey;
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

form textarea{
    height: 150px;
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
</style>
<?php
if(!isset($_SESSION['name'])||!isset($_SESSION['password'])){
    echo"<script>location.href='login.php'</script>";
}else{
    $name=$_SESSION['name'];
    include("define.php");
    echo"<center>";
    echo"<form action='editprofile.php' method='post'>";
    echo"Author is a:<br><br>";
    $conn = mysqli_connect(host,user,password,db);
    $s="SELECT * FROM user WHERE username = '$name'";
    $q=mysqli_query($conn,$s);
    while($row=mysqli_fetch_array($q)){
    echo"<textarea name='profile' placeholder='Type the content which is to be shown at the bottom of the page as your description when you post an article, e.g. Professor in C++. Likes to build OpenGL games and has a profound interest in making the world o gaming creative'>".$row['profile']."</textarea><br><br>";
    }
    echo"<button>Upgrade</button>";
    }
    
?>