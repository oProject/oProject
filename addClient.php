<?php 
require_once 'globalFunction.php';
?>

<html dir="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>ברוכים הבאים לפרויקט X</h1>
	<h1>כניסת מנהל</h1>
	<h2>הוספת לקוח</h2>
	<br />
	<br />
	<form method="post" action="InsertClient.php">
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
				<td><input type="text" name="mPhone" /> <select name="preMPhone"
					style="">
						<?php $option=populatePrePhone(); echo $option?>
				</select>
				</td>
			</tr>
			<tr>
				<td>טלפון במשרד</td>
				<td><input type="text" name="hPhone" /> <select name="preHPhone"
					style="">
						<?php $option=populatePrePhone(); echo $option?>
				</select>
				</td>
			</tr>
			<tr>
				<td>פקס</td>
				<td><input type="text" name="fax" /> <select name="preFax" style="">
						<?php $option=populatePrePhone(); echo $option?>
				</select>
				</td>
			</tr>
			<tr>
				<td>מקצוע</td>
				<td><select name="fProId" style="">
						<?php $option=populatePro(); echo $option?>
				</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit" /></td>
			</tr>
		</table>

		<!-- 									'name="fProId"/>' -->
		<!-- 		secondery profession:		<input type="text" name="sProId"/><br/> -->
		<!-- 		third profession: 			<input type="text" name="tProId"/><br/> -->
	</form>