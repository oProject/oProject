<?php
//hagay
// $mysqli = new mysqli ( "localhost", "root", "", "test" );

// if ($mysqli->connect_errno) {
// echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }
/**
 * setting tbl in database
 */
// opening connectin to database
$con = mysqli_connect ( "localhost", "root", "", "test" );
if (mysqli_connect_errno ()) {
	die ( "failed to connect to MySQL: " . mysqli_connect_error () );
} else
	echo "connect V<br>";
	
	// adding row to table.
	// ! $mysqli->query ( "INSERT INTO tblCenter (id,test)" );
	// &
	// mysqli_query ( $con, "INSERT INTO tblCenter(id,text) VALUES ('5','Hellow World 5')" );
	// deleting row from database.
	// $sql = mysqli_query ($con, "SELECT * FROM tblCenter" );

echo "connect 44 <br>";
$sql = "SELECT * FROM tblcenter";
$result = mysql_query("SELECT * FROM tblcenter");

if(!$result)
	die('Invalid query: ' .mysql_erreo());

// print_r(mysql_fetch_row($result));
// print_r(mysql_fetch_lengths ($num_rows));
echo "test <br>";
// for($i = 0; $i < $lengths; $i ++) {
// echo "the Number is" .$i."<br>";

// mysqli_query ( $con, "DELETE FROM tblCenter WHERE id=$i" );
// }
//

// updating recordset inside table

// ! $mysqli->query ( "UPDATE tblCenter SET text='helloWorld' WHERE id='4'" );

/**
 * geting data from tbl
 */
// getting a table.

// getting a spesfic row from table.

// getting a spesfic col from table.

// if (!$mysqli->query("DROP TABLE IF EXISTS pipi") ||
// !$mysqli->query("CREATE TABLE pipi(id INT)") ||
// !$mysqli->query("INSERT INTO pipi(id) VALUES (1)")) {
// echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
// }

// ! $mysqli->query ( "UPDATE tblCenter SET text='helloWorld' WHERE id='4'" );
// !$mysqli->query("UPDATE INTO tblCenter(text) VALUES (helloWorld)");
// mysqli_query($con,"UPDATE Persons SET Age=36
// WHERE FirstName='Peter' AND LastName='Griffin'");

// echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;

// $result = $mysqli->query ( "SELECT * FROM tblCenter" );
// while($row = $result->fetch_array() != NULL) {
// print debugit($row);
// }
// print debugit ( $result->fetch_all () );
// function debugit($value) {
// return '<pre>' . print_r ( $value, TRUE ) . '</pre>';
// }

// Create connection
// $con=mysqli_connect("localhost","root","","test");

// Check connection
// if (mysqli_connect_errno($con))
// {
// echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

mysqli_close ( $con );
?>