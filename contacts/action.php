<?php
session_start();
include 'config.php';
$update=false;
  $id="";
  $name="";
  $email="";
  $phone="";
  $photo="";
if(isset($_POST['add'])){
    
  global $con;
  $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
  $photo=$_FILES['image']['name'];
  $upload="upload/".$photo;
  $query="insert into crud(name, email, phone, photo) values('$name', '$email', '$phone', '$upload')";
  move_uploaded_file($_FILES['image']['tmp_name'], $upload);
   $result=mysqli_query($con, $query);
   if($result)
   {
    header("location: index.php");
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";
   }
   else
   {
echo "please check your query";
   }
}

if(isset($_GET['delete'])){
  $id=$_GET['delete'];

  $sql="SELECT photo FROM crud WHERE id=?";
  $stmt2=$con->prepare($sql);
  $stmt2->bind_param("i", $id);
  $stmt2->execute();
  $result2=$stmt2->get_result();
  $row=$result2->fetch_assoc();

  $imagepath=$row['photo'];
  unlink($imagepath);

  $query="DELETE FROM crud WHERE id=?";
  $stmt=$con->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();
    header("location: index.php");
    $_SESSION['response']="Successfully Deleted fromt the Database!";
    $_SESSION['res_type']="danger";
   
}

if(isset($_GET['edit'])){
$id=$_GET['edit'];
$query="SELECT * FROM crud WHERE id=?";
  $stmt=$con->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();

  $id=$row['id'];
  $name=$row['name'];
  $email=$row['email'];
  $phone=$row['phone'];
  $photo=$row['photo'];

  $update=true;
}
if(isset($_POST['update'])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $oldimage=$_POST['oldimage'];

  if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
    $newimage="upload/".$_FILES['image']['name'];
    unlink($oldimage);
    move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
  }else{
    $newimage=$oldimage;
  }
  
$query = "UPDATE crud SET
 id='{$id}', name='{$name}', email='{$email}', phone='{$phone}', photo='{$newimage}' WHERE id={$id}" ;
  $result=mysqli_query($con, $query);
   if($result)
   {
    header("location: index.php");
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="primary" ;
   }
   else
   {
echo "please check your query";
   }
}



if(isset($_GET['details'])){
  $id=$_GET['details'];
  $query="SELECT * FROM crud WHERE id=?";
    $stmt=$con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
  
    $vid=$row['id'];
    $vname=$row['name'];
    $vemail=$row['email'];
    $vphone=$row['phone'];
    $vphoto=$row['photo'];
  
    $update=true;
  }
?>