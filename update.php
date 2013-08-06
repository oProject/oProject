<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>welcome to porjectX</h1>
	<h1>admin entry</h1>
	<h2>adding profession</h2>
</body>
</html>
<?php
include 'globalDefine.php';
include 'globalFunction.php';

//connector between pages//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("LOGIN","login.php");
//end//
$error=null;
if((isset($_POST['user'])) and (!empty($_POST['user']))){
	$loginUser = $_POST['user'];
}
else
	$error=$error."user is empty,";
if((isset($_POST['pass'])) and (!empty($_POST['pass'])))
	$loginPass = $_POST['pass'];
else
	$error=$error." password is empty.";
if ($error==null){
	if(checkPrams($loginUser, $loginPass)){
		$row=returnParams($loginUser, $loginPass);
		$option=populatePro();

		//testing whats comming back//
		// 		print_r($row);		//
		//		data from server	//
		
		//original login details//
		echo '<form method="post" action="updateRow.php">';
		print "<table border=1 align=center style=margin: 1px auto;>";
		print "<tr>";
			print "<td>";
				print "פרטי משתמש מקורי";
			print "</td>";
		print "</tr>";
		print "<tr>";
			print "<td>";
				print "שם משתמש מקורי:";
			print "</td>";
			print "<td>";
				print "<input readonly type=text name=loginUser value='$loginUser'>";
			print "</td>";
		print "</tr>";
			print "<td>";
				print "סיסמאת משתמש מקורי:";
			print "</td>";
			print "<td>";
				print "<input readonly type=text name=loginPass value='$loginPass'>";
			print "</td>";
		print "</tr>";
		print "</table>";
		
		print "<br>";
		
		print "<table border=1 align=center style=margin: 1px auto;>";
// 		echo 'user Name: 						<input type="text" name="user" value='.$user=$row['user'].'><br/>';
			print "<tr>";
				print "<td>";
					print "פרטים לשינוי";
				print "</td>";
			print "</tr>";
			print "<tr>";
				print "<td>";
					print "שם משתמש:";
				print "</td>";
				print "<td>";
				$user=$row['user'];
					print "<input type=text name=user value='$user'>";
				print "</td>";
			print "</tr>";

// 		echo 'wanted website name: 				<input type="text" name="wName" value='.$wName=$row['wName'].'><br/>';
			print "<tr>";
				print "<td>";
					print "שם אתר לשינוי:";
				print "</td>";
				print "<td>";
					$wName=$row['wName'];
					print "<input type=text name=wName value='$wName'>";
				print "</td>";
			print "</tr>";

// 		echo 'password: 						<input type="text" name="pass" value='.$pass=$row['pass'].'><br/>';
			print "<tr>";
				print "<td>";
					print "סיסמא לשינוי:";
				print "</td>";
				print "<td>";
					$pass=$row['pass'];
					print "<input type=text name=pass value='$pass'>";
				print "</td>";
			print "</tr>";
			
// 		echo 'email: 							<input type="text" name="mail" value='.$mail=$row['mail'].'><br/>';
			print "<tr>";
				print "<td>";
					print "אימייל לשינוי:";
				print "</td>";
				print "<td>";
					$mail=$row['mail'];
					print "<input type=text name=mail value='$mail'>";
				print "</td>";
			print "</tr>";
			
// 		echo 'first name: 						<input type="text" name="fName" value='.$fName=$row['fName'].'><br/>';
			print "<tr>";
				print "<td>";
					print "שם פרטי לשינוי:";
				print "</td>";
				print "<td>";
					$fName=$row['fName'];
					print "<input type=text name=fName value='$fName'>";
				print "</td>";
			print "</tr>";
			
// 		echo 'last name: 						<input type="text" name="lName" value='.$lName=$row['lName'].'><br/>';
			print "<tr>";
				print "<td>";
					print "שם משפחה לשינוי:";
				print "</td>";
				print "<td>";
					$lName=$row['lName'];
					print "<input type=text name=lName value='$lName'>";
				print "</td>";
			print "</tr>";

// 		echo 'mobile phone: 					<input type="text" name="mPhone" value='.$mPhone=$row['mPhone'].'><br/>';
			print "<tr>";
				print "<td>";
					print "טלפון נייד לשינוי:";
				print "</td>";
				print "<td>";
					$mPhone=$row['mPhone'];
					print "<input type=text name=mPhone value='$mPhone'>";
				print "</td>";
			print "</tr>";
			
// 		echo 'home phone: 						<input type="text" name="hPhone" value='.$hPhone=$row['hPhone'].'><br/>';
			print "<tr>";
				print "<td>";
					print "טלפון בבית לשינוי:";
				print "</td>";
				print "<td>";
					$hPhone=$row['hPhone'];
					print "<input type=text name=hPhone value='$hPhone'>";
				print "</td>";
			print "</tr>";

// 		echo 'fax number: 						<input type="text" name="fax" value='.$fax=$row['fax'].'><br/>';
			print "<tr>";
				print "<td>";
					print "פקס לשינוי:";
				print "</td>";
				print "<td>";
					$fax=$row['fax'];
					print "<input type=text name=fax value='$fax'>";
				print "</td>";
			print "</tr>";

//		echo 'primery profession: 				<select name="fProId"> '.$option.'</select><br/>';
			print "<tr>";
				print "<td>";
					print "מקצוע לשינוי:";
				print "</td>";
				print "<td>";
					$fax=$row['fax'];
					print "<select name=fProId>'.$option.'</select>";
				print "</td>";
			print "</tr>";
// 		echo '<input type="submit" name="submit"/>';
			print "<tr>";
				print "<td>";
					print "";
				print "</td>";
				print "<td>";
					print "<input type=submit name=submit/>";
				print "</td>";
			print "</tr>";
			
// 		echo 'secondery profession:				<input type="text" name="sProId" value='.$sProId=$row['sPro'].'><br/>';
// 		echo 'third profession: 				<input type="text" name="tProId" value='.$tProId=$row['thirdPro'].'><br/>';
		print "</table>";
		echo '</form>';
	}
	else{
		printf("user name and password u enterd isnt valid try again");
		printf("<br/>");
		echo'<a href='.DOC_ROOT.LOGIN.'>'.LOGIN.'</a>';
	}
}
else{
	printf($error);
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	echo'<a href='.DOC_ROOT.LOGIN.'>'.LOGIN.'</a>';
}

?>