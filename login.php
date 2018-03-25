<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tanna Enterprise</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->

</head>
<body>
  <?php  $error=""; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-3 col-sm-6">
      	<div id="login" class="modal">
        		<form class="modal-content animate" id= "modal-content" action="" method="POST">
      			<div class="imgcontainer">
      				<img src="images/img_avatar.png" alt="Avatar" class="avatar">
      			</div>

      			<div class="container text-vertical-center" id="loginContainer">
      				
      				<input type="text" placeholder="Username" name="name" required><br> <br>
      				
      				<input type="password" placeholder="Password" name="password" required><br> <br>
      				<input type="submit" class="btn btn-dark" value="Login" name="login"><br>
      			</div>
      		</form>
      	</div>
      </div>
    </div>
  </div>
	<?php 

	include_once  'connection.php';
		session_start();
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			$name= mysqli_real_escape_string($conn,$_POST['name']);
 			$password=MD5($_POST['password']);
 			$sql = "SELECT password FROM admin where name= '$name'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      $pass= $row['password'];
      if($password == $pass ) {
        //session_register("name");
        if($count == 1){
          $_SESSION['login_user'] = $name;
          $error="Success";
          header("location:admin.php");
        }
      }
      else {
        $error = "Login Credentials invalid";
      }
		}
	?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function(){	
			$('#login').show();
		});
	</script>

</body>
</html>