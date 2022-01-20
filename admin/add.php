<?php
session_start();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php
$name=$_SESSION['name'];
include("define.php");
if(!isset($_SESSION['name'])||!isset($_SESSION['password'])){
    echo"<script>location.href='login.php'</script>";
}else{?>
<center>
<form action="add.php" method="post">
<h1>ADD AN ARTICLE</h1>
<label>Title of the Article (within 200 charecters)</label><br><br>
<input type="text" name="title"><br><br>
<label>Content of the Article (within 10000 charecters)</label><br><br>
<textarea name="content"></textarea><br><br>
<button>Post</button>
</form>
</center>
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

<?php
if(isset($_POST['title'])&&isset($_POST['content'])){
$title=$_POST['title'];
$content=$_POST['content'];
$conn = mysqli_connect(host,user,password,db);
    if($conn){
        $s2 = "SELECT * FROM post WHERE title='$title' OR content='$content'";
        $q = mysqli_query($conn,$s2);
        $q2 = mysqli_num_rows($q);
        if($q2==0){
            $i = " INSERT INTO post (title,content,author) values ('$title','$content','$name')";
            $query = mysqli_query($conn,$i);
            if($query){
                echo"<h1>ARTICLE PUBLISHED</h1>";
            }
        }else{
            echo"<h1>POST EXISTS</h1>";
        }
    }
}
}
?>