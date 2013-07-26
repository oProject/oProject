<?php 
require_once 'globalFunction.php';
?>

<html dir="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>welcome to porjectX</h1>
	<h1>admin entry</h1>
	<h2>server entry</h2>
	<br />
	<br />
	<form method="post" action="Insert.php">
		<table align="center" style="margin: 1px auto;">
			<tr>
				<td><a href="http://localhost/localOProject/addPro.php"><button
							type="button">addPro.php</button> </a></td>
				<td><a href="http://localhost/localOProject/login.php"><button
							type="button">login.php</button> </a></td>
			</tr>
			<tr>
				<td>:שם משתמש</td>
				<td><input type="text" name="user" /></td>
			</tr>
			<tr>
				<td>שם אתר:</td>
				<td><input type="text" name="wName" /></td>
			</tr>
			<tr>
				<td>סיסמא:</td>
				<td><input type="text" name="pass" /></td>
			</tr>
			<tr>
				<td>אימייל</td>
				<td><input type="text" name="mail" /></td>
			</tr>
			<tr>
				<td>שם פרטי:</td>
				<td><input type="text" name="fName" /></td>
			</tr>
			<tr>
				<td>שם משפחה:</td>
				<td><input type="text" name="lName" /></td>
			</tr>
			<tr>
				<td>טלפון נייד</td>
				<td><input type="text" name="mPhone" /></td>
			</tr>

			<tr>
				<td>טלפון במשרד</td>
				<td><input type="text" name="hPhone" /></td>
			</tr>
			<tr>
				<td>פקס</td>
				<td><input type="text" name="fax" /></td>
			</tr>
			<tr>
				<td>מקצוע</td>
				<td><select name="fProId"><?php $option=populatePro(); 
									echo $option?>
				</select><br />
				</td>
			</tr>
			<tr>

				<td></td>
				<td align="left"><input type="submit" name="submit" /></td>
			</tr>
		</table>

		<!-- 									'name="fProId"/>' -->
		<!-- 		secondery profession:		<input type="text" name="sProId"/><br/> -->
		<!-- 		third profession: 			<input type="text" name="tProId"/><br/> -->
	</form>