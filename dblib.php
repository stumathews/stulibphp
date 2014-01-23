<?php

/***
* Name: connect_db($host, $username, $password)
* Description: Connects to the specificed database server using supplied credentials
* Returns: A connection object which may be invalid so caller should check it
*/
function dblib_connect($host, $db, $username, $password)
{
	$connection = mysql_connect($host, $username, $password);
	if(!$connection) die("Cannot connect to the database, check availability and credentials: ".mysql_error());
	dblib_usedb($db);
	return $connection;
}

/**
* Name: dblib_usedb($db)
* Description: Selects a database to use, using the current open mysql connection
* Returns: nothing or error
**/
function dblib_usedb($db)
{
	mysql_select_db($db) or die("Cannot use databse. Check its availability");
}

/****
* Name: dblib_query($query, $connection)
* Description: Issues a SQl query to specifed $database that is currently selected, using the provided $connection
* Returns: An array representing the result set
*****/
function dblib_query($query, $database, $connection)
{
	dblib_usedb($database);
	$results = mysql_query($query, $connection);
	return $results;
}


?>

