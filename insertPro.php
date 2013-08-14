<<<<<<< HEAD
<?php
include 'globalDefine.php';
include 'globalFunction.php';
=======
<html DIR="RTL">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>welcome to porjectX</h1>
	<h1>admin entry</h1>
	<h2>adding profession</h2>
>>>>>>> branch 'master' of https://github.com/oProject/oProject.git

	<?php
	include 'globalDefine.php';
	include 'globalFunction.php';
	//connector between pages//
	define ("DOC_ROOT","http://localhost/localOProject/");
	define ("ADD_PRO","addPro.php");
	//end//

	$ans=null;

	if((isset($_POST['profession'])) and (!empty($_POST['profession']))){
		$profession = $_POST['profession'];
		if ((proValid($profession))==true){
			$ans=1;
		}
		else {
			$ans=2;
		}
	}
	else {
		$ans=3;
	}
<<<<<<< HEAD

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
=======
	//open connection to server//
	$mySqliCon = openMySqliConnect();
	switch ($ans){
		case 1:
			// if wanted profession exist in db return false.
			$proR=exrectingError($mySqliCon, 1);
			echo '<center>'.$proR['error'].'</center>';
			echo'<center><a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a></center>';
			break;
		case 2:
			//if not exist add to database this profession//
			insertProRecord($mySqliCon, $profession);
			$proR=exrectingError($mySqliCon, 2);
			echo '<center>'.$proR['error'].'</center>';
			echo 'go back';
			echo'<center><a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a></center>';
			break;
		case 3:
			//user didn't fill any text in the text box.
			$proR=exrectingError($mySqliCon, 3);
			echo '<center>'.$proR['error'].'</center>';
			echo '<br/>';
			echo '<center>go back</center>';
			echo '<center><a href='.DOC_ROOT.ADD_PRO.'>'.ADD_PRO.'</a></center>';
			break;
	}
	?>
</body>
</html>
>>>>>>> branch 'master' of https://github.com/oProject/oProject.git
