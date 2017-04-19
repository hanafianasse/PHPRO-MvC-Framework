<?php

class db{

/*** Declare instance ***/
private static $instance = NULL;

/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/
public function __construct() {
  /*** maybe set the db name here later ***/
}

/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*


public static function __getInstance() {

if (!self::$instance)
    {
    self::$instance = new PDO("mysql:host=localhost;dbname=mvc_db",'root','');;
    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
return self::$instance;
}
*/
public static function getInstance() {
return  mysql_connect("localhost","root","");
}

function query_db($query,$link)
{
	mysql_select_db('mvc_db',$link) or die ("Erruer 0x0001 Database");
	$result = mysql_query($query,$link);
	return $result;
}
function fetch_results($result)
{
	return mysql_fetch_array($result);
}


/**
*
* Like the constructor, we make __clone private
* so nobody can clone the instance
*
*/
private function __clone(){
}

} /*** end of class ***/

?>
