
<?php 
include 'action.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Address Records</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen,projection,print"/>
<!--// Document Script //-->
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</head>
<body >
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Address Records</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
   
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav> 
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 mt-3 bg-info p-2 rounded" >
        <h2 class="bg-light p-2 rounded text-center text-dark">ID: <?= $vid; ?></h2>
        <div class="text-center">
            <img src="<?= $vphoto; ?>" width="300" class="img-thumbnail" >

        </div>
        <h4 class="text-light  p-3"> Name: <?= $vname; ?></h4>
        <h4 class="text-light p-3" > Email: <?= $vemail; ?></h4>
        <h4  class="text-light p-3"> Phone: <?= $vphone; ?></h4>
        </div>
</div>

</div>
</body>
</html>