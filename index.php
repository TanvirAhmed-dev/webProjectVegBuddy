<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logIn.css">
    <title>VegBuddy</title>
</head>



<body>
    <div class="login_part">
    <form method="post" action="authentication/user_authentication.php" class="login" enctype="multipart/form-data">
		<!-- <h1>User Login</h1> -->
		<input type="email" name="email" class="login-input" placeholder="Email Address" autofocus required><br>

		<input type="password" name="password" class="login-input" placeholder="Password" required><br>

		<input type="submit" value="login" class="login-submit">

		<p class="login-help"><a href="#">Forgot password?</a><br/><br/><a href="signUp/user_SignUp.php"><font size="2px">Create New Account</font></a></p>
  </form>
</div>
</body>
</html>