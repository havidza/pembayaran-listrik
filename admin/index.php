<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>LOGIN LISTRIK</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="login.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" autofocus="autofocus" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
			</div>
		</form>
	</div>
</body> 
</script>
</html>
</body>
</html>