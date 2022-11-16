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
		<form action="php/staff/RegAction.php" method="post">
			<h1>Register</h1>
			<div>
				<input type="text" id="username" name="staffid"/>
			</div>
			<div>
				<input type="password" id="password" name="password"/>
                                <input type="password" id="password" name="password1"/>
			</div>
			<div>
				<input type="submit" value="Submit" />
                                <input type="submit" value="Back" formaction="index.php"/>
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