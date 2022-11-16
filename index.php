<?php
	session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>303COM</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<form action="php/login.php" method="post">
			<h1>KP Group</h1>
			<div>
				<input type="text" id="username" name="username"/>
			</div>
			<div>
				<input type="password" id="password" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="ResetPw.php">Lost your password?</a>
				<a href="Register.php">Register</a>
			</div>
		</form>
		<div class="button">
<?php
               if(isset($_SESSION['ERRMSG_ARR']))
		      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		          echo  "<h4><font color='red'>" .$msg. "</h4></font>"; 
				}
               unset($_SESSION['ERRMSG_ARR']);
?>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</body>
</html>