<?php
include 'globalDefine.php';
include 'globalFunction.php';

//connector between pages//
define ("DOC_ROOT","http://localhost/localOProject/");
define ("LOGIN","login.php");
//end//
$error=null;
if((isset($_POST['user'])) and (!empty($_POST['user']))){
	$loginUser = $_POST['user'];
}
else
	$error=$error."user is empty,";
if((isset($_POST['pass'])) and (!empty($_POST['pass'])))
	$loginPass = $_POST['pass'];
else
	$error=$error." password is empty.";
if ($error==null){
	if(checkPrams($loginUser, $loginPass)){
		$row=returnParams($loginUser, $loginPass);

		//testing whats comming back//
		// 		print_r($row);		//
		//		data from server	//
		echo '<form method="post" action="updateRow.php">';

		echo 'original login details';
		echo '<br/>';
		echo 'original user Name: 				<input readonly type="text" name="loginUser" value='.$loginUser.'><br/>';
		echo 'original pass Name: 				<input readonly type="text" name="loginPass" value='.$loginPass.'><br/>';
		echo '<br/>';

		echo 'wanted info for change';
		echo '<br/>';
		echo 'user Name: 						<input type="text" name="user" value='.$wName=$row['user'].'><br/>';
		echo 'wanted website name: 				<input type="text" name="wName" value='.$wName=$row['wName'].'><br/>';
		echo 'password: 						<input type="text" name="pass" value='.$wName=$row['pass'].'><br/>';
		echo 'email: 							<input type="text" name="mail" value='.$mail=$row['mail'].'><br/>';
		echo 'first name: 						<input type="text" name="fName" value='.$fName=$row['fName'].'><br/>';
		echo 'last name: 						<input type="text" name="lName" value='.$lName=$row['lName'].'><br/>';
		echo 'mobile phone: 					<input type="text" name="mPhone" value='.$mPhone=$row['mPhone'].'><br/>';
		echo 'home phone: 						<input type="text" name="hPhone" value='.$hPhone=$row['hPhone'].'><br/>';
		echo 'fax number: 						<input type="text" name="fax" value='.$fax=$row['fax'].'><br/>';
		echo 'primery profession: 				<input type="text" name="fProId" value='.$fProId=$row['fPro'].'><br/>';
		echo 'secondery profession:				<input type="text" name="sProId" value='.$sProId=$row['sPro'].'><br/>';
		echo 'third profession: 				<input type="text" name="tProId" value='.$tProId=$row['thirdPro'].'><br/>';

		echo '<input type="submit" name="submit"/>';
		echo '</form>';
	}
	printf("user name and password u enterd isnt valid try again");
	printf("<br/>");
	echo'<a href='.DOC_ROOT.LOGIN.'>'.LOGIN.'</a>';
}
else{
	printf($error);
	printf("<br/>");
	printf("go back");
	printf("<br/>");
	echo'<a href='.DOC_ROOT.LOGIN.'>'.LOGIN.'</a>';
}

?>
