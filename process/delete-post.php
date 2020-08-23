<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}


if(!(isset($_POST['blog_id']))){header("Location: ../");}
else{
if(isset($_SESSION['username']) || isset($_SESSION['admin_username'])){
include('conn.php');

$blog_id = htmlentities(stripslashes(trim($_POST['blog_id'])));


if(isset($_SESSION['admin_username'])){
  $username = $_SESSION['admin_username'];

$sql = "SELECT*FROM blogs WHERE blog_id = '$blog_id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

$blog_path = $row['blog_path'];
$blog_image = $row['image'];
unlink("../blog/".$blog_path."/index.php");
unlink("../blog/images/".$blog_image);
rmdir("../blog/".$blog_path);

$sql = "DELETE FROM blogs WHERE blog_id = '$blog_id'";
mysqli_query($conn,$sql);
echo "1";
}
else{
  if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];

  $sql = "SELECT*FROM blogs WHERE (blog_id = '$blog_id' AND blog_author = '$username')";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($query);

  $blog_path = $row['blog_path'];
  $blog_image = $row['image'];
  unlink("../blog/".$blog_path."/index.php");
  unlink("../blog/images/".$blog_image);
  rmdir("../blog/".$blog_path);

  $sql = "DELETE FROM blogs WHERE (blog_id = '$blog_id' AND blog_author = '$username')";
  mysqli_query($conn,$sql);
  echo "1";

}}

}
else{die();}
}
?>
