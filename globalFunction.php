<?php

/**
 *
 * things to do:
 כל לקוח חדש שפותח חשבון נפתח בעבורו את הדברים הבאים בשרת!
 עמוד עיצוב, webPageName.css.
 תיקיית תמונות, folder/webPageName
 אופציה של איחזור סיסמא

 template בשביל התצוגה של הלקוח.

 */


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
 * this method update a client record set and update it According.
 */
function updateDataClient ($mySqliCon,$loginPass, $loginUser,
		$user,$wName,$pass, $mail,$fName,$lName,$mPhone,
		$hPhone,$fax,$fPro){//,$sPro,$thirdPro
	updateDataClientUser($mySqliCon, $loginUser, $loginPass, $user);
	updateDataClientWName($mySqliCon, $loginUser, $loginPass, $wName);
	updateDataClientPass($mySqliCon, $loginUser, $loginPass, $pass);
	updateDataClientMail($mySqliCon, $loginUser, $loginPass, $mail);
	updateDataClientFName($mySqliCon, $loginUser, $loginPass, $fName);
	updateDataClientLName($mySqliCon, $loginUser, $loginPass, $lName);
	updateDataClientMPhone($mySqliCon, $loginUser, $loginPass, $mPhone);
	updateDataClientHPhone($mySqliCon, $loginUser, $loginPass, $hPhone);
	updateDataClientFax($mySqliCon, $loginUser, $loginPass, $fax);
	updateDataClientFPro($mySqliCon, $loginUser, $loginPass, $fPro);
	// 	updateDataClientSPro($mySqliCon, $loginUser, $loginPass, $sPro);
	// 	updateDataClientsThirdPro($mySqliCon, $loginUser, $loginPass, $thirdPro);
	// 	printf("</br>");
	// 	printf("updated 1 record");
}

//update all of the client element//
function updateDataClientUser ($mySqliCon,$loginUser,$loginPass,$user){
	//update clienttb;
	$sql="UPDATE clienttb SET user='$user' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
	//update client data tb;
	$sql="UPDATE clientdatatb SET user='$user' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
	$loginUser=$user;
}

function updateDataClientWName ($mySqliCon,$loginUser,$loginPass,$wName){
	$sql="UPDATE clienttb SET wName='$wName' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);

}

function updateDataClientPass ($mySqliCon,$loginUser,$loginPass,$pass){
	//update clienttb;
	$sql="UPDATE clienttb SET pass='$pass' WHERE user='$loginUser' and pass='$loginPass'"; //
	mysqli_query($mySqliCon,$sql);
	//update clintdatatb;
	$sql="UPDATE clientdatatb SET pass='$pass' WHERE user='$loginUser' and pass='$loginPass'"; //
	mysqli_query($mySqliCon,$sql);
	$loginpass=$pass;
}

function updateDataClientMail ($mySqliCon,$loginUser,$loginPass,$mail){
	$sql="UPDATE clienttb SET mail='$mail' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFName ($mySqliCon,$loginUser,$loginPass,$fName){
	$sql="UPDATE clienttb SET fName='$fName' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientLName ($mySqliCon,$loginUser,$loginPass,$lName){
	$sql="UPDATE clienttb SET lName='$lName' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientMPhone ($mySqliCon,$loginUser,$loginPass,$mPhone){
	$sql="UPDATE clienttb SET mPhone='$mPhone' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientHPhone ($mySqliCon,$loginUser,$loginPass,$hPhone){
	$sql="UPDATE clienttb SET hPhone='$hPhone' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFax ($mySqliCon,$loginUser,$loginPass,$fax){
	$sql="UPDATE clienttb SET fax='$fax' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientFPro ($mySqliCon,$loginUser,$loginPass,$fPro){
	$sql="UPDATE clienttb SET fPro='$fPro' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientSPro ($mySqliCon,$loginUser,$loginPass,$sPro){
	$sql="UPDATE clienttb SET sPro='$sPro' WHERE user='$loginUser' and pass='$loginPass'";
	// 	printf("$sql");
	mysqli_query($mySqliCon,$sql);
}

function updateDataClientsThirdPro ($mySqliCon,$loginUser,$loginPass,$thirdPro){
	$sql="UPDATE clienttb SET thirdPro='$thirdPro' WHERE user='$loginUser' and pass='$loginPass'";
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
 * this method add a profession record for the tb protb.
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
	//this parts add the client record to the client tb.
	$sql="INSERT INTO clienttb (user,wName,pass,mail,fName,lName
	,mPhone,hPhone,fax,fPro)
	VALUES ('$user','$wName','$pass','$mail','$fName','$lName',
	'$mPhone','$hPhone','$fax','$fPro')";
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "clienttb added 1 record set";

	//this parts add the relavent client record to the clientdatatb.
	$sql="INSERT INTO clientdatatb (user,pass)
	VALUES ('$user','$pass')";
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "clientdatatb added 1 record set";

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
	$result = mysql_query("SELECT user,pass FROM clientTb where user='$user' and pass='$pass'");
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
	if (validPass($pass) == true){
		$rejction="$rejction wanted pass isnt valid";
	}
	if (validPhone($hPhone) == true){
		$rejction="$rejction wanted home phone isnt valid";
	}
	if (validMPhone($mPhone) == true){
		$rejction="$rejction wanted mobile phone isnt valid";
	}
	if (validPhone($fax) == true){
		$rejction="$rejction wanted fax isnt valid";
	}
	return $rejction;
}

/**
 * this method needs to valid all of the data the
 * client enter in the update page.
 */
function updateRecordValid($mySqliCon, $loginUser,$loginPass,
		$user,$wName, $pass,$mail,$fName,
		$lName,$mPhone,$hPhone,$fax,$fPro,$rejction){//,$sPro,$thirdPro
	//check the correct tb in db for this proffesion;
	$link = connect();
	$loginRow = returnParams($loginUser, $loginPass);
	$rejction = $rejction + ganriValid($user, $loginUser,$rejction,1);
	$rejction=$rejction + ganriValid($wName, $loginRow['wName'], $rejction,2);
	$rejction=$rejction + ganriValid($pass, $loginRow['pass'], $rejction,3);
	$rejction=$rejction + ganriValid($mail, $loginRow['mail'], $rejction,4);
	$rejction=$rejction + ganriValid($fName, $loginRow['fName'], $rejction,0);
	$rejction=$rejction + ganriValid($lName, $loginRow['lName'], $rejction,0);
	$rejction=$rejction + ganriValid($mPhone, $loginRow['mPhone'], $rejction,5);
	$rejction=$rejction + ganriValid($hPhone, $loginRow['hPhone'], $rejction,6);
	$rejction=$rejction + ganriValid($fax, $loginRow['fax'], $rejction,6);
	$rejction=$rejction + ganriValid($fPro, $loginRow['fPro'], $rejction,0);
	// 	$rejction=ganriValid($sPro, $loginRow['sPro'], $rejction,0);
	// 	$rejction=ganriValid($thirdPro, $loginRow['thirdPro'], $rejction,0);
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
	$bool=null;
	switch ($num){
		case 0:
			return 0;
			break;
			//user
		case 1:
			//without any change//
			if(equal($first,$second)){
				return 0;
				break;
			}
			else if(validUser($first) == 0) {
				//exist and cant be changed//
				return 0;
				break;
			}
			else {
				return 1;
				break;
			}
			// 			wName
		case 2:
			if (equal($first,$second)){
				return 0;
				break;
			}
			else if (validWName($first) == 0){
				return 0;
				break;
			}
			else {
				return 1;
				break;
			}
			//pass
		case 3:
			if (equal($first,$second)){
				return 0;
				break;
			}
			else if (validPass($first) == 0){
				return 0;
				break;
			}
			else {
				return 1;
				break;
			}
			//mail
		case 4:
			if (equal($first,$second)){
				return 0;
				break;
			}
			else if (validMail($first)){
				return 1;
				break;
			}
			else {
				return 0;
				break;
			}
			//mobile phone
		case 5:
			if (equal($first,$second)){
				return 0;
				break;
			}
			else if (existMPhone($first) == 1){
				return 1;
				break;
			}
			else if (validMPhone($first)){
				return 1;
				break;
			}
			else {
				return 0;
				break;
			}//home phone
		case 6:
			if (validPhone($first)){
				return 1;
			}
			else
				return 0;
			break;
	}
}

/**
 * this method dig inside and checks if its equal;
 * if equal return true;
 * else return false;
 * @param String $first the first val to check;
 * @param String $second the second val to check;
 * @param String $rejction the rejction reason;
 * @return string
 */
function equal($first,$second){
	if ($first==$second){
		return TRUE;
	}
	else
		return FALSE;
}

//checks if the wanted user is valid//
function validUser($user){
	// 	printf("<br>");
	// 	echo $user;
	// 	printf("<br>");
	$result = mysql_query("SELECT user FROM clientTb where user='$user'");

	//if num of rows equels 0 then no row match the user name.
	//else if num of rows equels 1, then there a match in tb.
	$num_rows = mysql_num_rows($result);
	if ($num_rows == 1){
		// 		echo $num_rows;
		return 1;
	}
	else{
		//profession exist in db return true for not adding it.
		return 0;
	}
}
//checks if the wanted webName is valid//
function validWName($wName){
	$result = mysql_query("SELECT wName FROM clientTb where wName='$wName'");
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
//
/**
 * check if the wanted pass is bigger or equel to 8 digits.
 * @param $pass the wnted password.
 * return false if pass is valid return true if not.
 */
function validPass($pass){
	if (strlen($pass)>=8)
		return false;
	else
		return true;
}

//checks if the wanted mail is valid//
function validMail($mail){
	$result = mysql_query("SELECT mail FROM clientTb where mail='$mail'");
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
function existMPhone($mPhone){
	// 	printf($mPhone);
	$result = mysql_query("SELECT mPhone FROM clientTb where mPhone='$mPhone'");
	//if num of rows equels 0 then no row match the wanted profession.
	//return false for adding it.
	$num_rows = mysql_num_rows($result);
	// 	printf("<br>");
	// 	printf($num_rows);
	if ($num_rows == 0){
		return false;
	}
	else{
		//profession exist in db return true for not adding it.
		return true;
	}
}

//check if the wanted Phone number is valid
//if true phone isnt valid.
//if false phone valid.
function validPhone($Phone){
// 	$length=strlen($Phone);
// 	if ($length > 9) {
// 		printf("<br>");
// 		printf("larger");
// 		return true;
// 	}
// 	else if ($length < 9){
// 		printf("<br>");
// 		printf("smaller");
// 		return true;
// 	}
// 	else{
		return false;
// 	}
}

//check if the wanted Phone number is valid
//if true phone isnt valid.
//if false phone valid.
function validMPhone($Phone){
	$length=strlen($Phone);
	//($length < 10) and
	if ( ($length>10)) {
		printf("<br>");
		printf("larger");
		printf("<br>");
		return true;
	}
	else if ($length<10){
		return true;
		printf("smaller");
		printf("<br>");
	}
	else{
		return false;
	}
}

//check if the wanted fax is valid
//if true phone isnt valid.
//if false phone valid.
function validFax($fax){
	return false;
}

//check if the wanted fPro is valid
//if true phone isnt valid.
//if false phone valid.
function validFPro($fPro){
	return false;
}

//check if the wanted sPro is valid
//if true phone isnt valid.
//if false phone valid.
function validSPro($sPro){
	return false;
}

//check if the wanted thirdPro is valid
//if true phone isnt valid.
//if false phone valid.
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

	$query = "SELECT * FROM clientTb where user='$user' and pass='$pass'";

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

/**
 * this method populate the pro field in the client adding.
 */
function populatePrePhone(){
	$con = mysql_connect("localhost","root","");
	mysql_set_charset('utf8',$con);

	$db = mysql_select_db("ourproject",$con);
	$get=mysql_query("SELECT preNum,preID FROM prephonetb ORDER BY preID ASC");
	$option = '';
	while($row = mysql_fetch_assoc($get))
	{
		$option .= '<option value = "'.$row['preNum'].'">'.$row['preNum'].'</option>';
	}
	return $option;
}




//END sector 4: return methods//


//sector 5//
//error table//
//adding val to the list//
//adding errors for error table in data base;
/**
 * this method check if the error exist in error TB;
 * @param string $error
 * @return boolean true if error exist or flase if not.
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
 * this method add a record for the pre phone TB.
 *
 * @param mysqli_connecot $mySqliCon a connector for the database;
 * @param String $prePhone the wanted pre to add;
 */
function insertPrePhoneRecord ($mySqliCon,$prePhone){

	$sql="INSERT INTO prephonetb (preNum)
	VALUES ('$prePhone')";
	echo $sql;
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
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
 * this method extract the error Reason.
 * @param $mySqliCon - the database connector.
 * @param $errID - the wanted error number.
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