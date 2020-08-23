<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['admin_username'])){die(header('location: ../'));}


include"../../process/conn.php";


$sql="SELECT*FROM blogs";
$query=mysqli_query($conn,$sql);
$count_total_blogs=mysqli_num_rows($query);


$sql="SELECT*FROM views";
$query=mysqli_query($conn,$sql);
$count_unique_views=mysqli_num_rows($query);

$sql="SELECT*FROM like_or_dislike where like_or_dislike = 1";
$query=mysqli_query($conn,$sql);
$count_total_likes=mysqli_num_rows($query);

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


  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="../../vendor/style.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../../vendor/style.css">
<style>
body{
 font-family: 'PT Sans', sans-serif;
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
.modal-confirm {
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style>
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
       <a href="#">Site Admin</a>
     </div>
   </div>
 </div>

 <br>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12"  data-toggle="modal" data-target="#add-new-user-box" style="cursor:pointer;">

    <div class="card mb-3" style="height:250px;background:#8400a3">
    <div class="card-header add-new-user" style="color: #fff;" title='Add new Users'>Add new Users</div>
    <div class="text-center p-4">
    <i class='fas fa-user-plus text-light' style="font-size:100px;"></i>
    </div>
    </div>
    </div>

 <div class="col-lg-3 col-md-6 col-sm-12" style="cursor:pointer;">

 <div class="card mb-3" style="height:250px;background:#8400a3">
 <div class="card-header" style="color: #fff;" title='Statistics'>Total Blogs</div>
 <div class="text-center p-4">
 <span class='text-light' style="font-size:100px;"><?php echo $count_total_blogs?></span>
 </div>
 </div>
 </div>

 <div class="col-lg-3 col-md-6 col-sm-12" style="cursor:pointer;">

 <div class="card mb-3" style="height:250px;background:#8400a3">
 <div class="card-header" style="color: #fff;" title='Statistics'>Total Unique Views</div>
 <div class="text-center p-4">
 <span class='text-light' style="font-size:100px;"><?php echo $count_unique_views?></span>
 </div>
 </div>
 </div>

 <div class="col-lg-3 col-md-6 col-sm-12" style="cursor:pointer;">

 <div class="card mb-3" style="height:250px;background:#8400a3">
 <div class="card-header" style="color: #fff;" title='Statistics'>Total Likes</div>
 <div class="text-center p-4">
 <span class='text-light' style="font-size:100px;"><?php echo $count_total_likes?></sapn>
 </div>
 </div>
 </div>

</div>
</div>
<br>

<div class="container">

  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link theme-text active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Blog Details</a>
    <a class="nav-item nav-link theme-text" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">User details</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="row">
      <div class="col"></div>
      <div class="col-md-12">
        <table class="table table-striped">
    <thead>
     <tr>
       <th scope="col" class="text-center">#</th>
       <th scope="col" class="">Blog Title</th>
       <th scope="col" class="">Author</th>
       <th scope="col" class="text-center">Date</th>
       <th scope="col" class="text-center">Stats</th>
         <th scope="col" class="text-center">Action</th>
     </tr>
    </thead>
    <tbody>
          <tbody>
            <?php
            $sql="SELECT*FROM blogs ORDER BY id DESC";

            $query=mysqli_query($conn,$sql);
            $count_blogs=mysqli_num_rows($query);
            if($count_blogs>0){
              $post_number_counter = 0;
          while($row = mysqli_fetch_array($query)){
            $blog_id = $row['blog_id'];
            $blog_title = $row['blog_title'];
            $blog_path = $row['blog_path'];
            $blog_published_date = date('m/d/Y', $row['time']);
            $blog_author = $row['blog_author'];

            $sql_blog="SELECT*FROM views WHERE blog_id='$blog_id'";
            $query_blog=mysqli_query($conn,$sql_blog);
            $count_unique_views = mysqli_num_rows($query_blog);

            $sql_blog="SELECT*FROM like_or_dislike WHERE blog_id='$blog_id'";
            $query_blog=mysqli_query($conn,$sql_blog);
            $count_unique_likes = mysqli_num_rows($query_blog);
            $post_number_counter = $post_number_counter + 1;


            echo"
            <tr>
              <th scope='row' class='text-center'>$post_number_counter</th>
              <td><a href='../../blog/$blog_path' class='theme-text'>$blog_title</a></td>
              <td class='text-muted'>$blog_author</td>
              <td class='text-center text-muted'>$blog_published_date</td>
              <td class='text-center'>
              <div class='btn-group btn-group-xs' role='group' aria-label='Stats'>
                <button type='button' class='btn btn-default' title='Views' disabled><i class='fas fa-eye text-muted'> $count_unique_views</i> </button>
                <button type='button' class='btn btn-default shadow-none' title='Likes' disabled>  <i class='fas fa-thumbs-up text-muted'> $count_unique_likes </i> </button>


                    </div>
              </td>

              <td class='text-center'>
                <div class='btn-group btn-group-xs' role='group' aria-label='action'>
                          <button type='button' class='btn btn-default' title='Edit'><a href='#'><i class='fas fa-edit theme-text'></i></a></button>
                          <button type='button' class='btn btn-default delete-post-btn' data='$blog_id' title='Delete' data-toggle='modal' data-target='#delete-confim-modal'><a href='#'><i class='fas fa-trash-alt text-danger'></i></a></button>
                      </div>
              </td>
            </tr>
            ";

          }}else{
            echo"<center>No blogs yet!!</center>";
          }

             ?>

    </tbody>
    </table>
      </div>

    </div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="row">
      <div class="col"></div>
      <div class="col-md-12">
        <table class="table table-striped">
    <thead>
     <tr>
       <th scope="col" class="text-center">#</th>
       <th scope="col" class="">Username</th>
       <th scope="col" class="">User Type</th>
       <th scope="col" class="">Name</th>
       <th scope="col" class="text-center">Email</th>
       <th scope="col" class="text-center">Total Blogs</th>
       <th scope="col" class="text-center">Action</th>
     </tr>
    </thead>
    <tbody>
          <tbody>
            <?php
            $sql="SELECT*FROM users ORDER BY id ASC";

            $query=mysqli_query($conn,$sql);
            $count_users=mysqli_num_rows($query);
            if($count_users>0){
              $user_number_counter = 0;
          while($row = mysqli_fetch_array($query)){

            $username = $row['username'];
            $name = $row['name'];
            $email = $row['email'];

            if($row['level'] == 5){$user_type = "Admin";}
            elseif($row['level'] == 3){$user_type = "Author";}
            elseif($row['level'] == 2){$user_type = "Guest Blogger";}




            $sql_blog="SELECT*FROM blogs WHERE blog_author = '$username'";
            $query_blog=mysqli_query($conn,$sql_blog);
            $count_users_blog = mysqli_num_rows($query_blog);
            $user_number_counter = $user_number_counter + 1;


            echo"
            <tr>
              <th scope='row' class='text-center'>$user_number_counter</th>
              <td><a href='#' class='theme-text'>$username</a></td>
              <td class='text-muted'>$user_type</td>
              <td class='text-muted'>$name</td>

              <td class='text-center text-muted'>$email</td>
              <td class='text-center text-muted'>$count_users_blog</td>
              <td class='text-center'>
                <div class='btn-group btn-group-xs' role='group' aria-label='action'>
                          <button type='button' class='btn btn-default' title='Edit'><a href='#'><i class='fas fa-edit theme-text'></i></a></button>
                          <button type='button' class='btn btn-default' title='Delete' ><a href='#'><i class='fas fa-trash-alt text-danger'></i></a></button>
                      </div>
              </td>
            </tr>
            ";

          }}else{
            echo"<center>No Users yet!!</center>";
          }

             ?>

    </tbody>
    </table>
      </div>

    </div>
  </div>
</div>
</div>

<div class="modal fade" id="add-new-user-box" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header" style="border:none">
    <h5 class="modal-title">Add new user:</h5>
    <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body" >
    <span class="text-success success-msg text-center" style="display:none;">New user has been successfully added and verification link has been sent to the user's email.</span>
    <span class="text-danger error-msg text-center" style="display:none;"><center>Error adding the new user.</center></span>

   <form class="text-center add-new-user-form">
     <div class="form-group">
     <input type="text" class="form-control shadow-none" id="name-input" placeholder="Full Name" maxlength="40" required>
     </div>
<div class="form-group">
<input type="text" class="form-control shadow-none" id="username-input" placeholder="Username" maxlength="40" required>
</div>
<div class="form-group">
<input type="email" class="form-control shadow-none" id="email-input" placeholder="Email" required>
</div>

<button class="btn btn-theme shadow-none add-new-user-button">Add User
<div class="spinner-border spinner-border-sm text-light loader d-none">
<span class="sr-only"></span>
</div>
</button>
</form>
  </div>

</div>
</div>
</div>

<div id="delete-confim-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="fas fa-times"></i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>This blog will be permanently deleted.</p>
        <input type='hidden' id='blog_id_input_hdn' value=''>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger confirm-delete-post-button">Delete</button>
			</div>
		</div>
	</div>
</div>
  <!-- /Page Content End-->




  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  $('#add-new-user-box').submit(function(){ return false; });

$(".add-new-user").click(function(){
  $('#add-new-user-box').modal("show");
  $(".add-new-user-form").show();

  $('.error-msg').hide();
  $('.success-msg').hide();



});

$(".add-new-user-button").click(function(){
  $('.success-msg').hide();
  $('.error-msg').hide();
  $(".loader").show();

  function emailvalidate(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
if(emailvalidate($('#email-input').val())){

  $.post("add-user.php",{username: $('#name-input').val(),name: $('#name-input').val(), email: $('#email-input').val() },function(data){
  if(data==1){
  $(".add-new-user-form")[0].reset();
  $('.success-msg').show();
  }else{
  $('.error-msg').show();
  }
});
}
});
var blogId;
$(".delete-post-btn").click(function(){
  blogId = $(this).attr("data");
  $("#blog_id_input_hdn").val(blogId);

});
$(".confirm-delete-post-button").click(function(){
  $.post("../../process/delete-post.php",{blog_id: $("#blog_id_input_hdn").val()},function(data){
if(data==1){
location.reload(true); 
}
  })
});


</script>
</body>

</html>
