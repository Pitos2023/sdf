<!DOCTYPE html>
<html>
<head>
	<title>Successfully Registered</title>
	<style>
		body {
  			display: flex;
  			justify-content: center;
  			align-items: center;
  			height:  100vh;
  			margin: 0;
  			background: #005C90; 
  			background-size:cover;
  			background-repeat:no-repeat;
  			color:black;
			}
		.center-content {
   			text-align: center;
			 max-width: 650px;
  			padding: 30px;
  			background-color: rgba(177, 201, 239 );
  			border-radius: 10px;
		}
		a{
			text-decoration:none;
			color:red;
		}
	</style>
<body>
<div class="center-content">
       <h1>You have successfully Registered</h1>
       <h2>Welcome! <?= $_GET['username'] ?></h2>
       <b><a href="login.php">Click here to login.</a></b>
</div>
</body>
</html>