<?php
if(isset($_GET['search']))
{
$search_keyword = htmlentities(stripslashes(trim($_GET['search'])));
}else{$search_keyword='';}

if(isset($_GET['category']))
{
  $category =  htmlentities(stripslashes(trim($_GET['category'])));

  switch($category){
    case 1:
    $category_title = "Computer and Mobile Development";
    break;
    case 2:
    $category_title = "Blockchain And Cryptocurrency";
    break;
    case 3:
    $category_title = "Computer Networking and Cybersecurity";
    break;
    case 4:
    $category_title = "Automobile and Machinery";
    break;
    case 5:
    $category_title = "Data Science, Artificial Intelligence and IOT";
    break;
    case 6:
    $category_title = "Space Science";
    break;
    case 7:
    $category_title = "Nano Technology";
    break;
    case 8:
    $category_title = "Other Topics";
    break;
    default:
    $category_title = "Computer and Mobile Development";
    break;
  }

$category_input = "<input type='hidden' value='$category' name='category'>";
$search_placeholder = "Search blogs in $category_title";

$sql = "SELECT*FROM blogs WHERE (blog_title LIKE '%$search_keyword%' AND category = '$category') || (blog_description LIKE '%$search_keyword%' AND category = '$category') || (blog_body LIKE '%$search_keyword%' AND category = '$category')";
}else{
$category_input = "";
$search_placeholder = "Search blogs..";
$sql = "SELECT*FROM blogs WHERE (blog_title LIKE '%$search_keyword%') || (blog_description LIKE '%$search_keyword%') || (blog_body LIKE '%$search_keyword%')";
}

include_once("../process/conn.php");
$query=mysqli_query($conn,$sql);
$count_blogs=mysqli_num_rows($query);


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
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

 <style>
 body{
 font-family: 'PT Sans', sans-serif;
 background: #eee;
 }
 .container-fostrap {
 display: table-cell;
 padding: 1em;
 text-align: center;
 vertical-align: middle;
 }
 .fostrap-logo {
 width: 100px;
 margin-bottom:15px
 }
 h1.heading {
 color: #fff;
 font-size: 1.15em;
 font-weight: 900;
 margin: 0 0 0.5em;
 color: #505050;
 }
 @media (min-width: 450px) {
 h1.heading {
  font-size: 3.55em;
 }
 }
 @media (min-width: 760px) {
 h1.heading {
  font-size: 3.05em;
 }
 }
 @media (min-width: 900px) {
 h1.heading {
  font-size: 3.25em;
  margin: 0 0 0.3em;
 }
 }
 .card {
 display: block;
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
  transition: box-shadow .25s;
 }
 .card:hover {
 box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
 }
 .img-card {
 width: 100%;
 height:200px;
 border-top-left-radius:2px;
 border-top-right-radius:2px;
 display:block;
  overflow: hidden;
 }
 .img-card img{
 width: 100%;
 height: 200px;
 object-fit:cover;
 transition: all .25s ease;
 }
 .card-content {
 padding:15px;
 text-align:left;
 }
 .card-title {
 margin-top:0px;
 font-weight: 700;
 font-size: 1.65em;
 }
 .card-title a {
 color: #000;
 text-decoration: none !important;
 }
 .card-read-more {
 border-top: 1px solid #D4D4D4;
 }
 .card-read-more a {
 text-decoration: none !important;
 padding:10px;
 font-weight:600;
 text-transform: uppercase
 }
 </style>
</head>

<body style="background-color:#EEEEEE;">
  <!-- Page Content Start-->

  <div class="container-flex" style="margin-bottom:70px;">
 <header class="initial">
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="#">
        <img src="../vendor/images/ieteblogs.png" style='margin-top:5px;' height="40px" class="d-inline-block align-top" alt="">

      </a>
  <button class="navbar-toggler" style="border:none;" type="button" data-toggle="collapse"
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
 aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon text-white"></span>
  </button>

  <div class="collapse navbar-collapse text-centre" id="navbarSupportedContent" >




  <ul class="navbar-nav ml-auto ">
  <li class="nav-item">
  <a href="" class="nav-link"> </a>
  </li>
  <li class="nav-item">
  <a href=" "class="nav-link text-white">Home </a>

  </li>
  <li class="nav-item">
  <a href=" "class="nav-link text-white">Categories </a>
  </li>
  <li class="nav-item">
  <a href="#" class="nav-link text-white login-header" data-toggle="modal" data-target="#login-box"> Login</a>
  </li>
  <li class="nav-item">
  <a href=" "class="nav-link text-white">Contacts </a>
  </li>

   </ul>

  </div>
  </nav>

  <form class="search-form" action="../search" method="get" style="display:contents"><div class="search-box">
  <div class="input-group">
  <?php  echo $category_input ?>
  <input type="text" name="search" class="form-control shadow-none" style="border:none;" placeholder="<?php echo $search_placeholder ?>">
  <div class="input-group-append">
    <button type="button" class="btn shadow-none bg-white" style="border:none;" onClick="document.forms[0].submit();"><i class="text-muted fa fa-search"></i></button>
  </div>

</div>
</form>
</div>


  </div>
  <img src='../vendor/images/vase.png' style='height:100px;margin-top:-265px;margin-left: calc(5% - 25px);'></img>

  </header>
  </div>

  <div  class="container-fluid text-center" style="background-color:#EEEEEE;padding:40px;margin-bottom:0px;">
<h5 class="text-uppercase text-center" style="text-align:center;color:#808080">Search results for: <?php echo $search_keyword ?></h5>
    <br><div class="content">
              <div class="container-fluid">
                  <div class="row">
                  <?php
if($search_keyword!=""){
  
                  if($count_blogs>0){
                  while($row = mysqli_fetch_array($query)){
                    $blog_id = $row['blog_id'];
                    $sql_blog="SELECT*FROM views WHERE blog_id='$blog_id'";
                    $query_blog=mysqli_query($conn,$sql_blog);
                    $count_unique_views = mysqli_num_rows($query_blog);

                    $sql_blog="SELECT*FROM like_or_dislike WHERE blog_id='$blog_id'";
                    $query_blog=mysqli_query($conn,$sql_blog);
                    $count_unique_likes = mysqli_num_rows($query_blog);

                    $short_desc = substr($row['blog_description'], 0, 150);
                    $published_date = date('m/d/Y', $row['time']);
                    echo"
            <div class='col-lg-3 col-md-6 col-sm-12  d-flex align-items-stretch' >
            <div class='card'>
                              <a class='img-card' href='../blog/$row[blog_path]'>
                              <img style='border-bottom:1px solid #ebebeb;' src='../blog/images/$row[image]' />
                            </a>
                              <div class='card-content'>
                            <div> <span class='text-muted h6' style='font-size:0.7rem;'>Published on: $published_date </span>
            <span class='text-muted h6 float-right' style='margin-top:5px;font-size:0.7rem;'><span class='m-2'> $count_unique_views <i class='fas fa-eye'></i></span> <span> $count_unique_likes <i class='fas fa-thumbs-up'></i> </span></span>
            <hr>
            </div>

                                  <div style=''><h4 class='card-title'>
                                      <a href='../blog/$row[blog_path]'> $row[blog_title]
                                    </a>
                                  </h4>
                                  </div>
                                  <p class='text-muted'>
                                      $short_desc ...
                                  </p>
                              </div>
                              <div class='card-read-more ' style='position:absolute;bottom:0;width:100%;z-index:2;background:#fff;padding:1px;'>
                                  <a href='../blog/$row[blog_path]' class='btn btn-link btn-block theme-text'>
                                      Read More <i class='fas fa-arrow-circle-right'></i>
                                  </a>
                              </div>
                          </div>

            </div>";
                  }
                }else{echo "</div><div class='text-center'><br><h6 class='text-uppercase' style='text-align:center;color:#808080'>No result found for your search !!</h6></div>";}
}else{echo"<h6 class='text-uppercase' style='text-align:center;color:#808080'>Please enter keyword to search !!</span></h6>";}
                   ?>
</div>
    </div>

</div></div></div>



    <div class="modal fade" id="login-box" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border:none">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
       <form class="text-center signin-form">
  <div class="form-group">
    <input type="text" class="form-control shadow-none" id="username-input" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control shadow-none" id="password-input" placeholder="Password">
  </div>
  <p class="font-weight-normal text-danger error-msg" style="display:none">*Username or password is worng!!</p>
  <button class="btn btn-theme shadow-none signin-in-button">Sign in
  <div class="spinner-border spinner-border-sm text-light loader" role="status" style="display:none">
   <span class="sr-only"></span>
</div>
  </button>
</form>
      </div>

    </div>
  </div>
</div>




<div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C246.89,148.52 247.45,147.53 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #4D045D;"></path></svg></div>
<footer class="footer">

     <div class="container-fluid">
         <div class="gap">
             <div class="row">
                 <div class="col-sm-12 col-md-6 small">
                     <i class="fas fa-envelope-open-text"></i>
                     contact@ietebits.com<br><br>
                     <a style="color: white" href="https://www.facebook.com/ietebits/"> <i class="fab fa-facebook fa-2x"></i></a>
                     <a style="color: white" href="https://www.instagram.com/iete_bits/"><i style="margin: 0 10px" class="fab fa-instagram fa-2x"></i> </a>
                     <a style="color: white" href="https://twitter.com/bitsiete"><i class="fab fa-twitter fa-2x"></i></a>
                 </div>
                 <div class="col-sm-12 col-md-6"><br>
                     <div class="address-info small">
                         <i class="fas fa-map-marker-alt"></i>
                         Address <br> <img style="height: 30px; margin-right: 8px;margin-top:-5px; " src="../vendor/images/bit.png"> BIT Sindri, Dhanbad
                     </div>

                 </div>
             </div>
         </div>

     </div>

     <!-- Copyright -->
       <div class="footer-copyright text-light text-center small">
       Copyright © 2020 IETE BIT Sindri. <br>All Rights Reserved.
       </div>
   <!-- Copyright -->
</footer>
  <!-- /Page Content End-->





  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
 $('.signin-form').submit(function(){ return false; });
$('.signin-in-button').click(function(){
$('.error-msg').hide();
$('.loader').fadeIn();
$('.signin-in-button').addClass('disabled');


$.post("../process/start_session.php",{username: $('#username-input').val(),password: $('#password-input').val()},function(data){
$('.signin-in-button').removeClass('disabled');
$('.loader').fadeOut();
if(data==1){
location.replace("author");
}else{
$('.error-msg').show();
}
})
});
</script>
</body>

</html>
