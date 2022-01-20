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
    include("define.php");
    $name = $_SESSION['name'];
    $conn = mysqli_connect(host,user,password,db);
    $s = "SELECT * FROM post WHERE author = '$name'";
    $query = mysqli_query($conn,$s);
    echo"<center>";
    echo"<form action='edit.php' method='post'>";
    echo"<select name='article'>";
    while ($row = mysqli_fetch_array($query)) {
        echo"<option value='".$row['title']."'>".$row['title']."</option>";
    }
    echo"</select><br><br>";
    echo"<button>Edit Article</button>";
    echo"</form>";
    echo"</center>";
    if(isset($_POST['article'])){
        $article  = $_POST['article'];
        $s = "SELECT * FROM post WHERE author = '$name' AND title = '$article'";
        $query = mysqli_query($conn,$s);
        $id = null;
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            echo"<center>";
            echo"<form action='edit.php' method='get'>";
            echo"<input type='hidden' name='id' value='".$row['id']."'>";
            echo"<input type='text' name='title' value='".$row['title']."'><br><br>";
            echo"<textarea name='content'>".$row['content']."</textarea><br><br>";
            echo"<button>Make The Changes</button>";
            echo"</form>";
            echo"</center>";
        }
    }
    if(isset($_GET['title']) && isset($_GET['content'])){
        $id = $_GET['id'];
        $title = $_GET['title'];
        $content = $_GET['content'];
        $s = "UPDATE post SET title = '$title', content='$content' WHERE id = '$id'";
        $q = mysqli_query($conn,$s);
        if($q){
            echo"<script>alert('ARTICLE UPDATED')</script>";
        }
    }
}
?>