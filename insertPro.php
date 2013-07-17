<?php
include 'globalDefine.php';
include 'globalFunction.php';

//connector between pages//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("ADD_PRO","addPro.php");
//end//

if((isset($_POST['profession'])) and (!empty($_POST['profession']))){
	$profession = $_POST['profession'];

	//open connection to server//
	$mySqliCon=openMySqliConnect();

	//adding profession//
	//checks if proffesion exist//
	if ((proValid($profession))==true){
		printf("this profession '$profession' exist!");
		printf("<br/>");
		echo'<a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a>';
	}
	//if not exist add to database this profession//
	else {
		insertProRecord($mySqliCon, $profession);
		printf("<br/>");
		printf("go back");
		printf("<br/>");
		echo'<a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a>';
	}

	//close connection//
	mysqli_close($mySqliCon);
}
else {
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	echo'<a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a>';
}

?>
