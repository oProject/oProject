<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>welcome to porjectX</h1>
	<h1>admin entry</h1>
	<h2>adding Error</h2>
</body>
</html>
<?php 
include 'globalDefine.php';
include 'globalFunction.php';

//link shortcut//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("TESTING","addClient.php");
//end of define part//
//main//
$error=null;

if((isset($_POST['user'])) and (!empty($_POST['user']))){
	$user = $_POST['user'];
}
else
	$error=$error."שם משתמש הושאר ריק,";
if((isset($_POST['wName'])) and (!empty($_POST['wName'])))
	$wName = $_POST['wName'];
else
	$error=$error."שם אתר הושאר ריק,";
if((isset($_POST['pass'])) and (!empty($_POST['pass'])))
	$pass = $_POST['pass'];
else
	$error=$error."סיסמא הושאר ריק,";
if((isset($_POST['mail'])) and (!empty($_POST['mail'])))
	$mail = $_POST['mail'];
else
	$error=$error."אימייל הושאר ריק,";
if((isset($_POST['fName'])) and (!empty($_POST['fName'])))
	$fName = $_POST['fName'];
else
	$error=$error."שם פרטי הושאר ריק,";
if((isset($_POST['lName'])) and (!empty($_POST['lName'])))
	$lName = $_POST['lName'];
else
	$error=$error."שם משפחה הושאר ריק,";

if((isset($_POST['preMPhone'])) and (!empty($_POST['preMPhone'])))
	$preMPhone = $_POST['preMPhone'];
else
	$error=$error."קידומת טלפון נייד הושאר ריק,";
if((isset($_POST['mPhone'])) and (!empty($_POST['mPhone'])))
	$mPhone = $_POST['mPhone'];
else
	$error=$error."טלפון נייד הושאר ריק,";
if((isset($_POST['preHPhone'])) and (!empty($_POST['preHPhone'])))
	$preHPhone = $_POST['preHPhone'];
else
	$error=$error."קידומת טלפון בבית הושאר ריק,";
if((isset($_POST['hPhone'])) and (!empty($_POST['hPhone'])))
	$hPhone = $_POST['hPhone'];
else
	$error=$error."טלפון בבית הושאר ריק,";
if((isset($_POST['preFax'])) and (!empty($_POST['preFax'])))
	$preFax = $_POST['preFax'];
else
	$error=$error."קידומת פקס הושאר ריק,";
if((isset($_POST['fax'])) and (!empty($_POST['fax'])))
	$fax = $_POST['fax'];
else
	$error=$error."פקס הושאר ריק,";
// 	$fPro = $_POST['option'];
if((isset($_POST['fProId'])) and (!empty($_POST['fProId'])))
	$fPro = $_POST['fProId'];
else
	$error=$error."מקצוע עיקרי הושאר ריק.";

// if((isset($_POST['sProId'])) and (!empty($_POST['sProId'])))
// 	$sPro = $_POST['sProId'];
// else
// 	$error=$error." second profesion is empty,";
// if((isset($_POST['tProId'])) and (!empty($_POST['tProId'])))
// 	$thirdPro = $_POST['tProId'];
// else
// 	$error=$error." third profession is empty";

if ($error==null){
	$fax = $preFax.$fax;
	$hPhone = $preHPhone.$hPhone;
	$mPhone = $preMPhone.$mPhone;
	//open connection//
	$mySqliCon = openMySqliConnect();
	printf('<br/>');

	//inset record//
	$check=recordValid($mySqliCon, $user, $wName, $pass, $mail, $fName,
			$lName, $mPhone, $hPhone, $fax, $fPro); //, $sPro, $thirdPro
	if ($check==null){
		insertDataRecord($mySqliCon, $user, $wName, $pass,
				$mail, $fName, $lName, $mPhone, $hPhone,
				$fax, $fPro);//, $sPro, $thirdPro
		$insErr=exrectingError($mySqliCon, 2);
		echo '<center>'.$insErr['error'].'</center>';
		echo '<center><a href="'.DOC_ROOT.TESTING.'">'.TESTING.'</a></center>';
	}
	else{
		printf($check);
	}
	printf('<br/>');
	//end insert record//

	//close connection//
	mysqli_close($mySqliCon);
}
else{
	echo '<center>'.$error.'</center>';
	echo '<br/>';
	echo '<center>חזור אחורה</center>';
	echo '<center><a href="'.DOC_ROOT.TESTING.'">'.TESTING.'</a></center>';
}
//end of main//
?>