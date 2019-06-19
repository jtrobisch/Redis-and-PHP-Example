<!DOCTYPE html>
<html>
<head>
	<title>My Redis Example</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="login">
		<form action="authenticate.php" method="POST">
			<input type="text" placeholder="Username" id="username" name="username" required="true"> 
			<input type="password" placeholder="Password" id="password" name="password" required="true"> 
			<input type="submit" value="Sign In">
			<?php if(isset($_GET['loginStatus'])){
						if($_GET['loginStatus']==="Failed"){
							echo '<p class="error">Invalid Credentials given.</p>';
						}
					}
			?>
		</form>
	</div>
	<br/><br/>
	<div class="register">
		<form action="register.php" method="POST">
			<input type="text" placeholder="Username" id="RegUsername" name="RegUsername" required="true"> 
			<input type="password" placeholder="Password" id="RegPassword" name="RegPassword" required="true"> 
			<input type="text" placeholder="firstName" id="RegFirstName" name="RegFirstName" required="true">
			<input type="text" placeholder="lastName" id="RegLastName" name="RegLastName" required="true">
			<input type="text" placeholder="age" id="RegAge" name="RegAge" required="true"> 	 			
			<input type="submit" value="Register Account">
			<?php if(isset($_GET['status'])){
						if($_GET['status']==="Success"){
							echo '<p class="success">Account Generated Successfully</p>';
						}else{
							echo '<p class="error">Account Registration Failed</p>';
						}
					}
			?>
		</form>
	</div>
	
</body>
</html>




