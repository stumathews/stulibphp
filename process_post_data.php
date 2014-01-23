<?php
require("dblib.php"); // My function to connect to mysql

/* 
Process the incomming posted data from the form.
This includes writing/sending it to the databased.
var field_ids 		   = new Array("RunnerId","EventId","Date","FinishTime","Position","CategoryId","AgeGrade");
	var number_type_fields = new Array("RunnerId","EventId","CategoryId","AgeGrade","Position");
	var pb_type_fields 	   = new Array("PB");
	var date_type_fields   = new Array("Date");
	var time_type_fields   = new Array("FinishTime");
 */

$RunnerId =  $_POST["RunnerId"];
$EventId = $_POST["EventId"];
$Date =  $_POST["Date"];
$FinishTime = $_POST["FinishTime"];
$Position = $_POST["Position"];
$CategoryId = $_POST["CategoryId"];
$AgeGrade = $_POST["AgeGrade"];
$PB = $_POST["PB"];

echo "<h1>Success! Saved data:</h1>";

echo "<p>RunnerId : $RunnerId</p>";
echo "<p>EventId : $EventId</p>";
echo "<p>Date : $Date</p>";
echo "<p>FinishTime : $FinishTime</p>";
echo "<p>Position : $Position</p>";
echo "<p>CategoryId : $CategoryId</p>";
echo "<p>AgeGrade : $AgeGrade</p>";
echo "<p>PB : $PB</p>";

if(empty($PB))
	$PB=0;

/* lets write these values in to the database*/

$insert_query = "INSERT INTO Results (RunnerId,
									EventId,
									Date,
									FinishTime,
									Position,
									CategoryId,
									AgeGrade,
									PB)
				 VALUES($RunnerId,
				 		$EventId,
				 		'$Date',
				 		'$FinishTime',
				 		$Position,
				 		$CategoryId,
				 		$AgeGrade,
				 		$PB);";


$db = "srcm3_db";
// We should actually do a quick check to see if the databasse exists and then create it, else seelct form it.


$conn = dblib_connect("", $db, "srcm3","qHpUisdt");

$query = $insert_query;
$results = dblib_query($query, $db, $conn);
if (!$results) { // add this check.
    die('Invalid query: ' . mysql_error());
}


?>