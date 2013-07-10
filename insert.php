<?php 

//defines attributes//
define ("DB_HOST","localhost");
define ("DB_USERNAME","root");
define ("DB_PASSWORD","");
define ("DB_NAME","ourproject");
define ("DOC_ROOT","http://localhost/localOProject/");
define ("LINK","testing.php");

//end of define part//
//main//
$error=null;
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
	printf('//inset record//');
	printf('<br/>');

	$check=recordValid($mySqliCon, $user, $wName, $pass, $mail, $fName,
			$lName, $mPhone, $hPhone, $fax, $fPro, $sPro, $thirdPro);
	if ($check==null)
		insertDataRecord($mySqliCon, $user, $wName, $pass,
				$mail, $fName, $lName, $mPhone, $hPhone,
				$fax, $fPro, $sPro, $thirdPro);
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
echo '<a href="'.DOC_ROOT.LINK.'">'.LINK.'</a>';

//end of main//


//start of function//

/**
 * this method create a connection to the serevr
 * using mysqli connector.
 * return a valid connector for the server.
 */
function openMySqliConnect(){
	$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}else echo "success";
	return $con;
}

/**
 * this method open a new client in the table client of the database.
 * @param $con 		- connector to data base.
 * @param $user 	- user name of the client.
 * @param $wName 	- webname wanted by the client.
 * @param $pass 	- password for the website.
 * @param $mail 	- wanted mail name by client.
 * @param $fName 	- first name of client.
 * @param $lName 	- last name for client.
 * @param $mPhone	- mobile phone number.
 * @param $hPhone	- home phone number.
 * @param $fax		- fax phone number.
 * @param $fPro		- first profession of client.
 * @param $sPro		- second profession of client.
 * @param $thirdPro	- third profession of client.
 */
function insertDataRecord ($mySqliCon,$user,$wName,$pass,
		$mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro,$sPro,$thirdPro){

	$sql="INSERT INTO client (user,wName,pass,mail,fName,lName
	,mPhone,hPhone,fax,fPro,sPro,thirdPro)
	VALUES ('$user','$wName','$pass','$mail','$fName','$lName',
	'$mPhone','$hPhone','$fax','$fPro','$sPro','$thirdPro')";
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
}

/**
 * this method needs to valid all of the data the client enter.
 */
function recordValid($mySqliCon,$user,$wName,$pass,
		$mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro,$sPro,$thirdPro){
	//check the correct tb in db for this proffesion;
	$rejction=null;
	$link = connect();
	if (validUser($user) == true){
		$rejction="$rejction user name exist! ";
	}
	if (validMail($mail) == true){
		$rejction="$rejction eMail exist!";
	}
	if (validWName($wName) == true){
		$rejction="$rejction wanted web Name exist!";
	}
	return $rejction;
}

function connect(){
	$link = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	if (!mysql_select_db('ourproject')) {
		die('Could not select database: ' . mysql_error());
	}
	else{
		return $link;
	}
}
//user (!there)
function validUser($user){
	$result = mysql_query("SELECT user FROM client where user='$user'");
	//if num of rows equels 0 then no row match the wanted profession.
	//return false for adding it.
	$num_rows = mysql_num_rows($result);
	if ($num_rows == 0){
		return false;
	}
	else{
		//profession exist in db return true for not adding it.
		return true;
	}
}
//wName (!there)
function validWName($wName){
	$result = mysql_query("SELECT wName FROM client where wName='$wName'");
	//if num of rows equels 0 then no row match the wanted profession.
	//return false for adding it.
	$num_rows = mysql_num_rows($result);
	if ($num_rows == 0){
		return false;
	}
	else{
		//profession exist in db return true for not adding it.
		return true;
	}
}
//pass (n>6) ///shlomi how to check length of text and meanings if it valid.
// function validPass(){
// 	$result = mysql_query("SELECT proName FROM protb where proName='$profession'");
// }
//mail (!there)
function validMail($mail){
	$result = mysql_query("SELECT mail FROM client where mail='$mail'");
	//if num of rows equels 0 then no row match the wanted profession.
	//return false for adding it.
	$num_rows = mysql_num_rows($result);
	if ($num_rows == 0){
		return false;
	}
	else{
		//profession exist in db return true for not adding it.
		return true;
	}
}
?>