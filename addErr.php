<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>ברוכים הבאים לפרויקט X</h1>
	<h1>כניסת מנהל</h1>
	<h2>הוספת שגיאה</h2>

	<br />
	<form method="post" action="insertErr.php">
		<table border="1" align="center" style="margin: 1px auto;">
			<tr>
				<td></td>
				<td>
					<a href="http://localhost/localOProject/addPro.php"><button
							type="button">addPro.php</button> </a>
					<a href="http://localhost/localOProject/addClient.php"><button
							type="button">addClient.php</button> </a>
					<a href="http://localhost/localOProject/addErr.php"><button
							type="button">addErr.php</button> </a>
					<a href="http://localhost/localOProject/addPrePhone.php"><button
							type="button">addPrePhone.php</button></a>
				</td>
			</tr>
			<tr>
				<td>הכנס שם שגיאה:</td>
				<td><input type="text" name="err" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" />
				</td>
			</tr>
		</table>
	</form>

</body>
</html>
