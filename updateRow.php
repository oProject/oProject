<?php
include 'globalDefine.php';
include 'globalFunction.php';

//link shortcut//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("TESTING","testing.php");
//end of define part//
//main//

$error=null;

if((isset($_POST['loginUser'])) and (!empty($_POST['loginUser']))){
	$loginUser = $_POST['loginUser'];
}
else
	$error=$error."loginUser is empty,";
if((isset($_POST['loginPass'])) and (!empty($_POST['loginPass'])))
	$loginPass = $_POST['loginPass'];
else
	$error=$error."loginPassword is empty.";
if((isset($_POST['user'])) and (!empty($_POST['user']))){
	$user = $_POST['user'];
}
else
	$error=$error."user is empty,";
if((isset($_POST['wName'])) and (!empty($_POST['wName'])))
	$wName = $_POST['wName'];
else
	$error=$error." web name is empty,";
if((isset($_POST['pass'])) and (!empty($_POST['pass'])))
	$pass = $_POST['pass'];
else
	$error=$error." password is empty,";
if((isset($_POST['mail'])) and (!empty($_POST['mail'])))
	$mail = $_POST['mail'];
else
	$error=$error." email is empty,";

if((isset($_POST['fName'])) and (!empty($_POST['fName'])))
	$fName = $_POST['fName'];
else
	$error=$error." first Name is empty,";

if((isset($_POST['lName'])) and (!empty($_POST['lName'])))
	$lName = $_POST['lName'];
else
	$error=$error." last name is empty,";
if((isset($_POST['mPhone'])) and (!empty($_POST['mPhone'])))
	$mPhone = $_POST['mPhone'];
else
	$error=$error." Mobile phone is empty,";
if((isset($_POST['hPhone'])) and (!empty($_POST['hPhone'])))
	$hPhone = $_POST['hPhone'];
else
	$error=$error." home phone is empty,";
if((isset($_POST['fax'])) and (!empty($_POST['fax'])))
	$fax = $_POST['fax'];
else
	$error=$error." fax is empty,";
if((isset($_POST['fProId'])) and (!empty($_POST['fProId'])))
	$fPro = $_POST['fProId'];
else
	$error=$error." first profession is empty,";
if((isset($_POST['sProId'])) and (!empty($_POST['sProId'])))
	$sPro = $_POST['sProId'];
else
	$error=$error." second profesion is empty,";
if((isset($_POST['tProId'])) and (!empty($_POST['tProId'])))
	$thirdPro = $_POST['tProId'];
else
	$error=$error." third profession is empty";

if ($error==null){
	printf('//open connection//');
	$mySqliCon = openMySqliConnect();
	printf('<br/>');
	printf('//check if record is valid//');
	printf('<br/>');

	$check=updateRecordValid($mySqliCon, $loginUser,$loginPass,
			$user,$wName, $pass,$mail,$fName,
			$lName,$mPhone,$hPhone,$fax,$fPro,$sPro,$thirdPro);
	echo $check;
	if ($check==null){
		printf('<br/>');
		echo 'valid';
		//update recordset//
		// 		updateDataClient($mySqliCon,$loginPass, $loginUser,$user, $wName, $pass, $mail, $fName,$lName, $mPhone, $hPhone, $fax, $fPro,$sPro, $thirdPro);
	}
	// 	else{
	// 		printf($check);
	// 		printf('<br/>');
	// 		printf('//end insert record//');
	// 		//close connection//
	// 		mysqli_close($mySqliCon);
	// 	}
	// }
	// else{
	printf($error);
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	echo '<a href="'.DOC_ROOT.TESTING.'">'.TESTING.'</a>';
}
//end of main//
?>