<?php
session_start();
echo"<meta name='viewport' content='width=device-width,initial-scale=1.0'>";
echo'<link rel="stylesheet" href="http://'.$_SERVER['HTTP_HOST'].'/style.css">';
if(!isset($_SESSION['name'])||!isset($_SESSION['password'])){?>
    <script>location.href="login.php"</script>
<?php
}else{
    echo"<h1>DASHBOARD FOR ".$_SESSION['name']."</h1>";
    echo"<a class='intro' href='add.php'>Write an article</a><br>";
    echo"<a class='intro' href='delete.php'>Delete an article</a><br>";
    echo"<a class='intro' href='edit.php'>Edit an article</a><br>";
    echo"<a class='intro' href='editprofile.php'>Edit Your Profile</a><br>";
    echo"<a class='intro' href='adduser.php'>Add User</a><br>";
    echo"<a class='intro' href='logout.php'>Logout</a><br>";
}
?>