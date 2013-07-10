<?php
//hagay
//select scripts for protb//

define ("DB_HOST","localhost");
define ("DB_USERNAME","root");
define ("DB_PASSWORD","");
define ("DB_NAME","ourproject");

if((isset($_POST['profession'])) and (!empty($_POST['profession']))){
	$profession = $_POST['profession'];

	//open connection to server//
	$mySqliCon=openMySqliConnect();

	//adding profession//
	//checks if proffesion exist//
	if ((proValid($profession))==true){
		printf("this profession '$profession' exist!");
		printf("<br/>");
		printf("<a href=http://localhost/ourProject/ourProject/addPro.php>addPro.php</a>");

	}
	//if not exist add to database this profession//
	else {
		insertProRecord($mySqliCon, $profession);
		printf("<br/>");
		printf("go back");
		printf("<br/>");
		printf("<a href=http://localhost/ourProject/ourProject/addPro.php>addPro.php</a>");
	}

	//close connection//
	mysqli_close($mySqliCon);
}
else {
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	printf("<a href=http://localhost/ourProject/ourProject/addPro.php>addPro.php</a>");
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
	return $link;
}

/**
 * this method add a record for the tb protb.
 *
 * @param mysqli_connecot $mySqliCon a connector for the database;
 * @param String $profession the wnted param to add for tb;
 */
function insertProRecord ($mySqliCon,$profession){

	$sql="INSERT INTO protb (proName)
	VALUES ('$profession')";
	if (!mysqli_query($mySqliCon,$sql))
	{
		die('Error: ' . mysqli_error($mySqliCon));
	}
	echo "1 record added";
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
	return $con;
}
