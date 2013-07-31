<?php
//sector 1: connecting //
/**
 * this method open a link object to the data base.
 */
function connect(){
	$link = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	if (!mysql_select_db(DB_NAME)) {
		die('Could not select database: ' . mysql_error());
	}
	mysql_set_charset('utf8',$link);
	return $link;
}

/**
 * this method create a connection to the serevr
 * using mysqli connector.
 * return a valid connector for the server.
 */
function openMySqliConnect(){
	$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	//	else echo "success";
	mysqli_set_charset($con,'utf8');
	if (!$con->set_charset("utf8"))
		printf("Error loading character set utf8: %s\n", $con->error);
	return $con;
}


//END sector 1: connecting//

//sector 2: update and inserting recordset of the client tb//

/**
 *
 * @param unknown_type $mySqliCon
 * @param unknown_type $user
 * @param unknown_type $wName
 * @param unknown_type $pass
 * @param unknown_type $mail
 * @param unknown_type $fName
 * @param unknown_type $lName
 * @param unknown_type $mPhone
 * @param unknown_type $hPhone
 * @param unknown_type $fax
 * @param unknown_type $fPro
 * @param unknown_type $sPro
 * @param unknown_type $thirdPro
 */
function updateDataClient ($mySqliCon,$loginPass, $loginUser,
		$user,$wName,$pass, $mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro,$sPro,$thirdPro){
	updateDataClientUser($mySqliCon, $loginUser, $loginPass, $user);
	updateDataClientWName($mySqliCon, $loginUser, $loginPass, $wName);
	updateDataClientPass($mySqliCon, $loginUser, $loginPass, $pass);
	updateDataClientMail($mySqliCon, $loginUser, $loginPass, $mail);
	updateDataClientFName($mySqliCon, $loginUser, $loginPass, $fName);
	updateDataClientLName($mySqliCon, $loginUser, $loginPass, $lName);
	updateDataClientMPhone($mySqliCon, $loginUser, $loginPass, $wName);
	updateDataClientHPhone($mySqliCon, $loginUser, $loginPass, $hPhone);
	updateDataClientFax($mySqliCon, $loginUser, $loginPass, $fax);
	updateDataClientFPro($mySqliCon, $loginUser, $loginPass, $fPro);
	updateDataClientSPro($mySqliCon, $loginUser, $loginPass, $sPro);
	updateDataClientsThirdPro($mySqliCon, $loginUser, $loginPass, $thirdPro);
	printf("</br>");
	printf("updated 1 record");
}

//update all of the client element//

function updateDataClientUser ($mySqliCon,$loginUser,$loginPass,$user){
	$sql="UPDATE client SET user='$user' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientWName ($mySqliCon,$loginUser,$loginPass,$wName){
	$sql="UPDATE client SET wName='$wName' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientPass ($mySqliCon,$loginUser,$loginPass,$pass){
	$sql="UPDATE client SET pass='$pass' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientMail ($mySqliCon,$loginUser,$loginPass,$mail){
	$sql="UPDATE client SET mail='$mail' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFName ($mySqliCon,$loginUser,$loginPass,$fName){
	$sql="UPDATE client SET fName='$fName' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientLName ($mySqliCon,$loginUser,$loginPass,$lName){
	$sql="UPDATE client SET lName='$lName' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientMPhone ($mySqliCon,$loginUser,$loginPass,$wName){
	$sql="UPDATE client SET wName='$wName' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientHPhone ($mySqliCon,$loginUser,$loginPass,$hPhone){
	$sql="UPDATE client SET hPhone='hPhone' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFax ($mySqliCon,$loginUser,$loginPass,$fax){
	$sql="UPDATE client SET fax='$fax' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFPro ($mySqliCon,$loginUser,$loginPass,$fPro){
	$sql="UPDATE client SET fPro='$fPro' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientSPro ($mySqliCon,$loginUser,$loginPass,$sPro){
	$sql="UPDATE client SET sPro='$sPro' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientsThirdPro ($mySqliCon,$loginUser,$loginPass,$thirdPro){
	$sql="UPDATE client SET thirdPro='$thirdPro' WHERE user=$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

/**
 * this method check if the profession exist in profession TB;
 * @param string $profession
 * @return boolean true if profession exist or flase if not.
 */
function proValid($profession){
	$link = connect();
	//check the correct tb in db for this proffesion;
	$result = mysql_query("SELECT proName FROM protb where proName='$profession'");
	if (!$result) {
		die('Could not query:' . mysql_error());
	}
	else{
		//if num of rows equels 0 then no row match the wanted profession.
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

/**
 * this method add a record for the tb protb.
 *
 * @param mysqli_connecot $mySqliCon a connector for the database;
 * @param String $profession the wnted param to add for tb;
 */
function insertProRecord ($mySqliCon,$profession){

	$sql="INSERT INTO proTb (proName)
	VALUES ('$profession')";
	echo $sql;
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
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
		$hPhone,$fax,$fPro){//,$sPro,$thirdPro

	////,sPro,thirdPro
	$sql="INSERT INTO client (user,wName,pass,mail,fName,lName
	,mPhone,hPhone,fax,fPro)
	VALUES ('$user','$wName','$pass','$mail','$fName','$lName',
	'$mPhone','$hPhone','$fax','$fPro')";
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
}

//END sector 2: update a recordset of the client tb//

//sector 3: checking parames//
/**
 * this method checks if the username and password
 * are correct according to the database;
 */
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

/**
 * this method needs to valid all of the data the client enter.
 */
function recordValid($mySqliCon,$user,$wName,$pass,
		$mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro){//,$sPro,$thirdPro
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

/**
 * this method needs to valid all of the data the
 * client enter in the update page.
 */
function updateRecordValid($mySqliCon, $loginUser,$loginPass,
		$user,$wName, $pass,$mail,$fName,
		$lName,$mPhone,$hPhone,$fax,$fPro,$sPro,$thirdPro){
	//check the correct tb in db for this proffesion;
	$rejction=null;
	$link = connect();

	$loginRow=returnParams($loginUser, $loginPass);

	$rejction=ganriValid($user, $loginUser, $rejction,1);
	$rejction=ganriValid($wName, $loginRow['wName'], $rejction,2);
	$rejction=ganriValid($pass, $loginRow['pass'], $rejction,3);
	$rejction=ganriValid($mail, $loginRow['mail'], $rejction,4);
	$rejction=ganriValid($fName, $loginRow['fName'], $rejction,0);
	$rejction=ganriValid($lName, $loginRow['lName'], $rejction,0);
	$rejction=ganriValid($mPhone, $loginRow['mPhone'], $rejction,5);
	$rejction=ganriValid($hPhone, $loginRow['hPhone'], $rejction,0);
	$rejction=ganriValid($fax, $loginRow['fax'], $rejction,0);
	$rejction=ganriValid($fPro, $loginRow['fPro'], $rejction,0);
	$rejction=ganriValid($sPro, $loginRow['sPro'], $rejction,0);
	$rejction=ganriValid($thirdPro, $loginRow['thirdPro'], $rejction,0);
	return $rejction;
}

/**
 * this method is a ganari way to check if
 * the element is exist in db or not.
 *
 * @param string $first the first param to be checked.
 * @param string $second the param to be checked.
 * @param string $rejction if there any error print it.
 * @param int $num whet check infront of the database we need.
 */
function ganriValid($first,$second,$rejction,$num){
	switch ($num){
		case 0:
			echo $first.' return false automatic';
			printf('<br/>');
			return false;
			//user
		case 1:
			$bool=validUser($first);
			break;
			//wName
		case 2:
			$bool=validWName($first);
			break;
			//mail
		case 3:
			$bool=validPass($first);
			break;
			//pass
		case 4:
			$bool=validWName($first);
			break;
		case 5:
			$bool=validMPhone($first);
			break;
	}

	if (!($first==$second)){

		printf('<br/>');
		echo $first.' not equal dig dipper';
		printf('<br/>');
		if(!($bool)){
			echo $first.' dosnt exist in db';
			printf('<br/>');
		}
		else
			$rejction="$rejction . $first . exist! ";
	}
	else {
		echo $first.' without change';
		printf('<br/>');
		return $rejction;
	}
}

//checks if the wanted user is valid//
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
//checks if the wanted webName is valid//
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
//check if the wanted pass is valid
function validPass($pass){
	return false;
}

//checks if the wanted mail is valid//
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

//check if the wanted fName is valid
function validFName($fName){
	return false;
}

//check if the wanted lName is valid
function validLName($lName){
	return false;
}

//check if the wanted mPhone is valid
function validMPhone($mPhone){
	$result = mysql_query("SELECT mPhone FROM client where mPhone='$mPhone'");
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

//check if the wanted hPhone is valid
function validHPhone($hPhone){
	return false;
}

//check if the wanted fax is valid
function validFax($fax){
	return false;
}

//check if the wanted fPro is valid
function validFPro($fPro){
	return false;
}

//check if the wanted sPro is valid
function validSPro($sPro){
	return false;
}

//check if the wanted thirdPro is valid
function validThirdPro($thirdPro){
	return false;
}

//END sector 3: checking parames//


//sector 4: return methods//
/**
 * this method extract all the data about the
 * client from the client table;
 *
 * @param $user string as user name of the client;
 * @param $pass string as user name password;
 * @return $row one record from client tb for editing;
 */
function returnParams($user, $pass){

	$link = openMySqliConnect();
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$query = "SELECT * FROM client where user='$user' and pass='$pass'";

	$result = $link->query($query);

	$row = $result->fetch_array(MYSQLI_ASSOC);
	return $row;
}

/**
 * this method populate the pro field in the client adding.
 */
function populatePro(){
	$con = mysql_connect("localhost","root","");
	mysql_set_charset('utf8',$con);

	$db = mysql_select_db("ourproject",$con);
	$get=mysql_query("SELECT proName,proId FROM protb ORDER BY proName ASC");
	$option = '';
	while($row = mysql_fetch_assoc($get))
	{
		$option .= '<option value = "'.$row['proName'].'">'.$row['proName'].'</option>';
	}
	return $option;
}


//END sector 4: return methods//


//sector 5//
//error table//
//adding val to the list//
//adding errors for error table in data base;
/**
 * this method check if the profession exist in profession TB;
 * @param string $profession
 * @return boolean true if profession exist or flase if not.
 */
function errValid($error){
	$link = connect();
	//check the correct tb in db for this proffesion;
	$result = mysql_query("SELECT error FROM errtb where error='$error'");
	if (!$result) {
		die('Could not query:' . mysql_error());
	}
	else{
		//if num of rows equels 0 then no row match the wanted profession.
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

/**
 * this method add a record for the tb Error.
 *
 * @param mysqli_connecot $mySqliCon a connector for the database;
 * @param String $Err the wanted error to add;
 */
function insertErrRecord ($mySqliCon,$error){

	$sql="INSERT INTO errtb (error)
	VALUES ('$error')";
	echo $sql;
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
}

//exrecting val from the list//

/**
 *
 * @param unknown_type $mySqliCon
 * @param unknown_type $errID
 */
function exrectingError ($mySqliCon,$errID){

	$link = openMySqliConnect();
	

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$query = "SELECT error from errtb where errID='$errID'";

	$result = $link->query($query);

	$row = $result->fetch_array(MYSQLI_ASSOC);
	return $row;
}














?>