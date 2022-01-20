<?php
session_start();
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand" href="#">Community P Blog</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="http://communitypblog.ml">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/about.php">About</a>
      <a class="nav-item nav-link" href="/contact.php">Contact</a>
      <?php
      if(isset($_SESSION['password'])||isset($_SESSION['username'])){
          echo'<a class="nav-item nav-link" href="http://communitypblog.ml/admin/logout.php">Logout</a>';
      }else{
          echo'<a class="nav-item nav-link" href="http://communitypblog.ml/admin/login.php">Login</a>';
      }
      ?>
    </div>
  </div>
  <style>
      code{
          width:100%;
          background-color: #F9F1F1;
      }
  </style>
</nav>
</html>