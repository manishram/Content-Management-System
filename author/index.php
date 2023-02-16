<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){die(header('location: ../'));}


include"../process/conn.php";

if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){header("Location: index.php");
die();}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="theme-color" content="#4D045D">
  <title>IETE Blog - BIT Sindri </title>

  <!-- Bootstrap core CSS -->


  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="../vendor/style.css">
</head>

<body>
  <!-- Page Content Start-->

 <div class="topnav container-fluid" style="height:60px;">
   <div class="row">
     <div class="col-4">
       <a href="#">IETE Blogs</a>
     </div>
     <div class="col-8">
       <a href="#"><i class="fa fa-circle"></i></a>
       <a href="#"><?php echo $_COOKIE['cookie_username'] ?></a>
     </div>
   </div>
 </div>

 <br>

 <div class="dashboard-boxes container-fluid">
   <div class="row">
     <div class="col-lg-1"></div>
     <div class="col-sm-12 col-md-4 col-lg-2">
       <div class="author-square add-new">
           <a class="pencil-icon-link" href="add-new"><i class="fa tile-icon fa-pencil"></i></a>
           <a class="plus-icon-link" href="add-new"><i class="fa fa-plus"></i></a>
       </div>

     </div>
     <div class="col-sm-12 col-md-4 col-lg-2">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">OTHER INFO</a>
           <a href="#"><i class="fa tile-icon fa-thumb-tack"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>

     <div class="col-sm-12 col-md-4 col-lg-2">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">OTHER INFO</a>
           <a href="#"><i class="fa tile-icon fa-thumb-tack"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-2">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">TOTAL LIKES</a>
           <a href="#"><i class="fa tile-icon fa-thumbs-up"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-2">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">TOTAL VIEWS</a>
           <a href="#"><i class="fa tile-icon fa-eye"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>
     <div class="col-lg-1"></div>
   </div>
 </div>
<hr class="dashboard-hr">
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-11">
      <table class="table table-borderless rect-table">
        <tbody>
          <?php
          $sql="SELECT*FROM blogs WHERE blog_author='$_SESSION[username]'";

          $query=mysqli_query($conn,$sql);
          $count_blogs=mysqli_num_rows($query);
          if($count_blogs>0){
        while($row = mysqli_fetch_array($query)){
          echo"
          <tr>
            <td class='theme-text'><a class='theme-text' href='../blog/$row[blog_path]'>$row[blog_title]</a></td>
            <td class='like-view'>0 <i class='fa fa-thumbs-up'></i></td>
            <td class='like-view'>0 <i class='fa fa-eye'></i></td>
            <td><button type='button' class='btn btn-outline-primary'>EDIT</button></td>
            <td><button type='button' class='btn btn-outline-primary'>DELETE</button></td>
          </tr>
          ";

        }}else{
          echo"<center>No blogs posted by you!!</center>";
        }

           ?>


        </tbody>
      </table>
      <!-- <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title of the Blog</th>
      <th scope="col">Views</th>
      <th scope="col">Likes</th>
      <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>0 <i class='fa fa-eye'></i></td>
      <td>0 <i class='fa fa-thumbs-up'></i></td>
      <td>
        <button type='button' class='btn btn-outline-theme m-2 rounded-pill'>EDIT</button>
      </td>
      <td>
        <button type='button' class='btn btn-outline-theme m-2 rounded-pill'>DELETE</button>
      </td>
    </tr>

  </tbody>
</table> -->
    </div>
    <div class="col"></div>
  </div>
</div>

  <!-- /Page Content End-->




  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.slim.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
