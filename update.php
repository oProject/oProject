<?php
//defines attributes//
define ("DB_HOST","localhost");
define ("DB_USERNAME","root");
define ("DB_PASSWORD","");
define ("DB_NAME","ourproject");

//connector between pages//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("LOGIN","login.php");
//end//

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
if ($error==null){
	if(checkPrams($user, $pass)){

		$row=returnParams($user, $pass);
		
		//testing whats comming back//
		// 		print_r($row);
		
		//		data from server	//
		echo 'user Name: 						<input type="text" name="user" value='.$user.'><br/>';
		echo 'wanted website name: 				<input type="text" name="wName" value='.$wName=$row['wName'].'><br/>';
		echo 'password: 						<input type="text" name="pass" value='.$pass.'><br/>';
		echo 'email: 							<input type="text" name="mail" value='.$mail=$row['mail'].'><br/>';
		echo 'first name: 						<input type="text" name="Name" value='.$name=$row['fName'].'><br/>';
		echo 'last name: 						<input type="text" name="lName" value='.$lName=$row['lName'].'><br/>';
		echo 'mobile phone: 					<input type="text" name="mPhone" value='.$mPhone=$row['mPhone'].'><br/>';
		echo 'home phone: 						<input type="text" name="hPhone" value='.$hPhone=$row['hPhone'].'><br/>';
		echo 'fax number: 						<input type="text" name="fax" value='.$fax=$row['fax'].'><br/>';
		echo 'primery profession: 				<input type="text" name="fProId" value='.$fProId=$row['fPro'].'><br/>';
		echo 'secondery profession:				<input type="text" name="sProId" value='.$sProId=$row['sPro'].'><br/>';
		echo 'third profession: 				<input type="text" name="tProId" value='.$tProId=$row['thirdPro'].'><br/>';

		// 		printf('success');
	}
}
else{
	printf($error);
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	echo'<a href='.DOC_ROOT.LOGIN.'>'.LOGIN.'</a>';
}

/**
 *
 * @param unknown_type $val
 * @param unknown_type $user
 * @param unknown_type $pass
 */
function returnParams($user, $pass){

	// 		, $wName, $mail,
	// 		$lName, $mPhone, $hPhone, $fax,
	// 		$fPro, $sPro,$thirdPro){

	$link = openMySqliConnect();
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$query = "SELECT * FROM client";

	$result = $link->query($query);

	$row = $result->fetch_array(MYSQLI_ASSOC);
	return $row;
	// 	printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);

	// 	if ($result = mysqli_query($link, $query)) {

	// 		/* fetch associative array */
	// 		while ($obj = mysqli_fetch_object($result)) {
	// 			printf("<br/>");
	// 			$wName=$obj->wName;
	// 			$mail=$obj->mail;
	// 			$fName=$obj->fName;
	// 			$lName=$obj->lName;
	// 			$mPhone=$obj->mPhone;
	// 			$hPhone=$obj->hPhone;
	// 			$fax=$obj->fax;
	// 			$fPro=$obj->fPro;
	// 			$sPro=$obj->sPro;
	// 			$thirdPro=$obj->thirdPro;

	// 			array($wName,$mail,$fName, $lName,$mPhone,$hPhone,$fax,$fPro,$sPro,$thirdPro);


	// 			// 			printf ($wName."   ".$mail."   ".$fName."   ".$lName."   ".$mPhone."   ".$hPhone."   ".$fax."   ".$fPro."   ".$sPro."   ".$thirdPro);
	// 			// 			printf("<br/>");
	// 		}
	// 		/* free result set */
	// 		mysqli_free_result($result);
	// 		return array();
	// 	}

	// 	$result = mysql_query("select * from client");
	// 	while ($row = mysql_fetch_object($result)) {
	// 		echo $row->user_id;
	// 		echo $row->fullname;
	// 	}
	// 	mysql_free_result($result);


	// 	$result = $link->query ("SELECT * FROM client" );
	// 	while($row = $result->fetch_array() != NULL) {
	// 		print debugit($row);
	// 	}
	// 	print debugit ( $result->fetch_all () );
}

function debugit($value) {
	return '<pre>' . print_r ( $value, TRUE ) . '</pre>';
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
	// 	else echo "success";
	return $con;
}








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
