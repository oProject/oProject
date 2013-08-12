<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>welcome to porjectX</h1>
	<h1>admin entry</h1>
	<h2>adding pre phone</h2>

	<?php
	include 'globalDefine.php';
	include 'globalFunction.php';
	//connector between pages//
	define ("DOC_ROOT","http://localhost/localOProject/");
	define ("ADD_PRO","addPro.php");
	define ("ADD_PRE","addPrePhone.php");
	//end//
	$ans=null;

	if((isset($_POST['prePhone'])) and (!empty($_POST['prePhone']))){
		$prePhone = $_POST['prePhone'];
		//adding profession//
		if ((errValid($prePhone))==true){
			$ans=1;
		}
		else {
			$ans=2;
		}
	}
	else {
		$ans=3;
	}
	//open connection to server//
	$mySqliCon = openMySqliConnect();

	switch ($ans){
		case 1:
			// if wanted profession exist in db return false.
			$errR=exrectingError($mySqliCon, 1);
			echo '<center>'.$errR['error'].'</center>';
			echo'<center><a href='.DOC_ROOT.ADD_PRE.'>'.ADD_PRE.'</a></center>';
			break;
		case 2:
			//if not exist add to database this profession//
			insertPrePhoneRecord($mySqliCon, $prePhone);
			$errR=exrectingError($mySqliCon, 2);
			echo '<center>'.$errR['error'].'</center>';
			echo 'go back';
			echo'<center><a href='.DOC_ROOT.ADD_PRE.'>'.ADD_PRE.'</a></center>';
			break;
		case 3:
			//user didn't fill any text in the text box.
			$errR=exrectingError($mySqliCon, 3);
			echo '<center>'.$errR['error'].'</center>';
			echo '<br/>';
			echo '<center>תחזור למלא פרטים</center>';
			echo '<center><a href='.DOC_ROOT.ADD_PRE.'>'.ADD_PRE.'</a></center>';
			break;
	}
	?>
</body>
</html>
