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
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="../vendor/images/admin.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
      <label for="username-input" class="sr-only">Username</label>
      <input type="text" id="username-input" class="form-control" placeholder="username" required autofocus>
      <label for="password-input" class="sr-only">Password</label>
      <input type="password" id="password-input" class="form-control" placeholder="Password" required>
      <div class='text-danger error-msg' style="display:none">Username or Password is wrong !!</div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-dark btn-block signin-in-button" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">IETE BIT Sindri &copy; 2020</p>
    </form>


  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
 $('.form-signin').submit(function(){ return false; });
$('.signin-in-button').click(function(){
$('.error-msg').hide();
$('.signin-in-button').addClass('disabled');


$.post("start_session.php",{username: $('#username-input').val(),password: $('#password-input').val()},function(data){
$('.signin-in-button').removeClass('disabled');
if(data==1){
location.replace("dashboard");
}else{
$('.error-msg').show();
}
})
});
</script>
</body>

</html>
