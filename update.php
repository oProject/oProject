<?php
//defines attributes//
define ("DB_HOST","localhost");
define ("DB_USERNAME","root");
define ("DB_PASSWORD","");
define ("DB_NAME","ourproject");
//hagay
//end of define part//


$error=null;
if((isset($_POST['user'])) and (!empty($_POST['user']))){
  $user = $_POST['user'];
}
else
	$error=$error."user is empty,";
if((isset($_POST['pass'])) and (!empty($_POST['pass'])))
	$pass = $_POST['pass'];
else
	$error=$error." password is empty,";
if(checkPrams($user, $pass)){
	
	//data from server//
	printf('user Name: 					<input type="text" name="user" value=.$user/><br/>');
	printf('wanted website name: 		<input type="text" name="wName"/><br/>');
	printf('password: 					<input type="text" name="pass"/><br/>');
	printf('email: 						<input type="text" name="mail"/><br/>');
	printf('first name: 				<input type="text" name="fName"/><br/>');
	printf('last name: 					<input type="text" name="lName"/><br/>');
	printf('mobile phone: 				<input type="text" name="mPhone"/><br/>');
	printf('home phone: 				<input type="text" name="hPhone"/><br/>');
	printf('fax number: 				<input type="text" name="fax"/><br/>');
	printf('primery profession: 		<input type="text" name="fProId"/><br/>');
	printf('secondery profession:		<input type="text" name="sProId"/><br/>');
	printf('third profession: 			<input type="text" name="tProId"/><br/>');
	
	
	
	printf('success');
	
	
	
	
}
else{
	printf($error);
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	printf('<a href="http://localhost/ourProject/ourProject/testing.php">login.php</a>');
}
//open connection//
// $mySqliCon=openMySqliConnect();

// printf('<br/>');
// printf('//update record//');
// updateDataClient($mySqliCon, $user, $wName, $pass,
// 		$mail, $fName, $lName, $mPhone, $hPhone,
// 		$fax, $fPro, $sPro, $thirdPro);
// printf('<br/>');
// printf('//end update record//');
// printf('<br/>');


function updateDataClient ($mySqliCon,$user,$wName,$pass,
		$mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro,$sPro,$thirdPro){
	updateDataClientFax($mySqliCon, $user, $pass, $fax);
	updateDataClientFName($mySqliCon, $user, $pass, $fName);
	updateDataClientFPro($mySqliCon, $user, $pass, $fPro);
	updateDataClientHPhone($mySqliCon, $user, $pass, $hPhone);
	updateDataClientLName($mySqliCon, $user, $pass, $lName);
	updateDataClientMail($mySqliCon, $user, $pass, $mail);
	updateDataClientMPhone($mySqliCon, $user, $pass, $wName);
	updateDataClientSPro($mySqliCon, $user, $pass, $sPro);
	updateDataClientsThirdPro($mySqliCon, $user, $pass, $thirdPro);
	printf("</br>");
	printf("updated 1 record");
}

//update client element//

function updateDataClientMail ($mySqliCon,$user,$pass,$mail){
	$sql="UPDATE client SET mail='$mail' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFName ($mySqliCon,$user,$pass,$fName){
	$sql="UPDATE client SET fName='$fName' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientLName ($mySqliCon,$user,$pass,$lName){
	$sql="UPDATE client SET lName='$lName' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientMPhone ($mySqliCon,$user,$pass,$wName){
	$sql="UPDATE client SET wName='$wName' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientHPhone ($mySqliCon,$user,$pass,$hPhone){
	$sql="UPDATE client SET hPhone='hPhone' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFax ($mySqliCon,$user,$pass,$fax){
	$sql="UPDATE client SET fax='$fax' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFPro ($mySqliCon,$user,$pass,$fPro){
	$sql="UPDATE client SET fPro='$fPro' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientSPro ($mySqliCon,$user,$pass,$sPro){
	$sql="UPDATE client SET sPro='$sPro' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientsThirdPro ($mySqliCon,$user,$pass,$thirdPro){
	$sql="UPDATE client SET thirdPro='$thirdPro' WHERE user='$user' and pass='$pass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateValid(){
}

function checkPrams($user, $pass){
	$link = connect();
	//check if the password and user name exist in the db.
	$result = mysql_query("SELECT user,pass FROM client where user='$user' and pass='$pass'");
	if (!$result) {
		die('Could not query:' . mysql_error());
	}
	else{
		//if num of rows equels 0 then no row match the wanted user.
		//return false for adding it.
		$num_rows = mysql_num_rows($result);
		if ($num_rows == 0){
			mysql_close($link);
			return false;
		}
		else{
			//profession exist in db return true for not adding it.
			mysql_close($link);
			return true;
		}
	}
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

// /**
//  * this method check if the profession exist in profession TB;
//  * @param string $profession
//  * @return boolean true if profession exist or flase if not.
//  */
// function proValid($profession){
// 	$link = connect();
// 	//check the correct tb in db for this proffesion;
// 	$result = mysql_query("SELECT proName FROM protb where proName='$profession'");
// 	if (!$result) {
// 		die('Could not query:' . mysql_error());
// 	}
// 	else{
// 		//if num of rows equels 0 then no row match the wanted profession.
// 		//return false for adding it.
// 		$num_rows = mysql_num_rows($result);
// 		if ($num_rows == 0){
// 			mysql_close($link);
// 			return false;
// 		}
// 		else{
// 			//profession exist in db return true for not adding it.
// 			mysql_close($link);
// 			return true;
// 		}
// 	}
// }




?>
