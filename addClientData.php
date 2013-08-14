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
	<h2>הוספת פרטי עמוד</h2>
	<br />
	<br />
	<form method="post" action="InsertClientData.php">
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
							type="button">addPrePhone.php</button> </a>
				</td>
			</tr>
			<tr>
				<td>:כותרת (title)</td>
				<td><input type="text" name="title" /></td>
			</tr>
			<tr>
				<td>תיאור עמוד: (meta description)</td>
				<td><input type="text" name="description" /></td>
			</tr>
			<tr>
				<td>:מילות מפתח (meta keywords)</td>
				<td><input type="text" name="keywords" /></td>
			</tr>
			<tr>
				<td>שם הכותב: (meta Author)</td>
				<td><input type="text" name="author" /></td>
			</tr>
			<tr>
				<td>(meta Robots):</td>
				<td><input type="text" name="robots" /></td>
			</tr>
			<tr>
				<td>מהות האתר: (meta Abstract)</td>
				<td><input type="text" name="abstract" /></td>
			</tr>
			<tr>
				<td>זכויות יוצרים: (meta copyright):</td>
				<td><input type="text" name="copyright" /></td>
			</tr>
			<tr>
				<td>מחולל עמודים: (meta generator):</td>
				<td><input type="text" name="generator" /></td>
			</tr>
			<tr>
				<td>רובוטי גוגל: (meta googleboot):</td>
				<td><input type="text" name="googleBoot" /></td>
			</tr>
			<tr>
				<td>שפה: (meta language)</td>
				<td><input type="text" name="language" /></td>
			</tr>
			<tr>
				<td>מילות מפתח נוספות: (meta new keywords)</td>
				<td><input type="text" name="newKeywords" /></td>
			</tr>
			<tr>
				<td>כותרת לדף נחיתה: (meta page user title)</td>
				<td><input type="text" name="pageUserTitle" /></td>
			</tr>
			<tr>
				<td>טקסט לאתר</td>
				<td><input type="text" name="webText" /></td>
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