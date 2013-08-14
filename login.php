<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>ברוכים הבאים לפרויקט X</h1>
	<h1>כניסת משתמש</h1>

	<form method="post" action="updateClient.php">
		<h4>הכנס שם משתמש וסיסמא:</h4>
		<table border="1" align="center" style="margin: 1px auto;">
			<tr>
				<td></td>
				<td><a href="http://localhost/localOProject/addPro.php"><button
							type="button">addPro.php</button> </a> <a
					href="http://localhost/localOProject/addClient.php"><button
							type="button">addClient.php</button> </a> <a
					href="http://localhost/localOProject/addErr.php"><button
							type="button">addErr.php</button> </a> <a
					href="http://localhost/localOProject/addPrePhone.php"><button
							type="button">addPrePhone.php</button> </a></td>
			</tr>
			<tr>
				<td>:שם משתמש</td>
				<td><input type="text" name="user" /></td>
			</tr>
			<tr>
				<td>סיסמא:</td>
				<td><input type="text" name="pass" /></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit"
				
				</td>
			</tr>
			<tr>
				<td>משתמש חדש?</td>
				<td><a href="http://localhost/localOProject/addClient.php"><button
							type="button">לחץ כאן</button> </a></td>
			</tr>
		</table>

</body>
<p></p>
</form>