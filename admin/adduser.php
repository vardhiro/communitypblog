<?php
session_start();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
form{
    margin-top: 20px;
    padding: 30px;
    background-color: ivory;
    width: 40%;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
    color: grey;
}
@media(max-width:800px){
    form{
        width:95%;
    }
}

form .y{
    width: 90%;
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
include('define.php');
if(!isset($_SESSION['name'])&&!isset($_SESSION['password'])){
    echo"<script>location.href='login.php'</script>";
}else{
    $conn = mysqli_connect(host,user,password,db);
    $name = $_SESSION['name'];
    $password = $_SESSION['password'];
    $y = "SELECT * FROM user WHERE username = '$name'";
    $que = mysqli_query($conn,$y);
    while ($row = mysqli_fetch_array($que)) {
        if($row['canadd']=='YES'){
    ?>
    <center>
    <form action="adduser.php" method="post">
    <input type="text" class="y" name="name" placeholder="Enter new user's Name (name to be shown as the author and for admin panel)"><br><br>
    <input type="text" class="y" name="password" placeholder="Enter new user's password to login to the admin panel"><br><br>
    Can add user?(Like you are doing)   <br><br>
    <input type="radio" name="permission" value="YES">YES<br>
    <input type="radio" name="permission" value="NO">NO<br><br>
    <button>Add User</button>
    </form>
        </center>
    <?php
    if(isset($_POST['name']) && $_POST['password']){
        $permission = $_POST['permission'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $conn = mysqli_connect(host,user,password,db);
        $i = " INSERT user (username,password,canadd) values ('$name','$password','$permission')";
        $s = "select * from user where username='$name'";
        $q3 = mysqli_query($conn,$s);
        $q2 = mysqli_num_rows($q3);
        if($q2==0){
            $q = mysqli_query($conn,$i);
            if($q){
                echo"<script>alert('USER ADDED')</script>";
            }
        }else{
                echo"<script>alert('USER EXISTS')</script>";
        }
    }
}else{
        echo"<h1 style='font-size:6rem;text-align:center;'>YOU HAVE NO PREMISSION TO ADD ANY USER</h1>";
}
}
}
?>