<?php 
include 'globalDefine.php';
include 'globalFunction.php';

//link shortcut//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("TESTING","testing.php");
//end of define part//
//main//
$error=null;

print_r($_POST);

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

// 	$fPro = $_POST['option'];
if((isset($_POST['fProId'])) and (!empty($_POST['fProId'])))
	$fPro = $_POST['fProId'];	
else
	$error=$error." first profession is empty.";
echo $fPro;

// if((isset($_POST['sProId'])) and (!empty($_POST['sProId'])))
// 	$sPro = $_POST['sProId'];
// else
// 	$error=$error." second profesion is empty,";
// if((isset($_POST['tProId'])) and (!empty($_POST['tProId'])))
// 	$thirdPro = $_POST['tProId'];
// else
// 	$error=$error." third profession is empty";
if ($error==null){
	printf('//open connection//');
	$mySqliCon = openMySqliConnect();
	printf('<br/>');
	printf('//inset record//');
	printf('<br/>');

	$check=recordValid($mySqliCon, $user, $wName, $pass, $mail, $fName,
			$lName, $mPhone, $hPhone, $fax, $fPro); //, $sPro, $thirdPro
	if ($check==null)
		insertDataRecord($mySqliCon, $user, $wName, $pass,
				$mail, $fName, $lName, $mPhone, $hPhone,
				$fax, $fPro);//, $sPro, $thirdPro
	else{
		printf($check);
	}
	printf('<br/>');
	printf('//end insert record//');
	//close connection//
	mysqli_close($mySqliCon);
}
else
	printf($error);
printf("<br/>");
printf("go back");
printf("<br/>");
echo '<a href="'.DOC_ROOT.TESTING.'">'.TESTING.'</a>';

//end of main//
?>