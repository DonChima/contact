
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
<body>
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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="text-center text-dark mt-2">Address Record for Students</h3>
            <hr>
            <?php if(isset($_SESSION['response'])){ ?>
            <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $_SESSION['response']; ?>
            
            </div>
            <?php } unset($_SESSION['response']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center text-info">Add Record      </h3>
            <form action="action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>" >
        <div class="form-group">
            <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" value="<?= $phone; ?>" class="form-control" placeholder="Enter phone" required>
        </div>
        <div class="form-group">
        <input type="hidden" name="oldimage" value="<?= $photo; ?>" >
            <input type="file" name="image" class="custom-file" >
            <img src="<?= $photo; ?>" width="120" class="img-thumbnail" >
        </div>
        <div class="form-group">
          <?php if($update==true){ ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
          <?php } else {?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
          <?php } ?>
        </div>
    </form>
        </div>
        <div class="col-md-8">
        <h3 class="text-center text-info">Records Present in the School Records   </h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Details</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    
                </tr>
            </thead>
            <tr>
       <?php 
       include 'config.php';
       global $con;
     
    $query = "select * from crud";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
  ?>
 
      <tr>
            <td> <?php echo $row['id'];  ?></td>
            <td><img src="<?php echo $row['photo'];  ?>"  width="25"/></td>
            <td><?php echo $row['name'];  ?></td>
            <td><?php echo $row['email'];  ?></td>
            <td><?php echo $row['phone'];  ?></td>
            <td > 
                 <a href="detail.php?details=<?= $row['id'];  ?>" class="badge badge-primary p-2">Details</a>
              </td>
            <td > 
                
                 <a href="action.php?delete=<?= $row['id'];  ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want to delete this record?')">Delete</a>
            </td>
            <td > 
                 <a href="index.php?edit=<?= $row['id'];  ?>" class="badge badge-success p-2">Edit</a>

            </td>
        </tr> 
 <?php   
      }
   ?>
        
   </table>           
        </div>
    </div>
</div>
</body>
</html>
