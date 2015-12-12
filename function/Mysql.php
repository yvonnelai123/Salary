<?php
class Mysql
{
	public function __construct()
	{
		$this->connect();
	}
	public function connect()
	{	
	   	$DB_HOST="127.0.0.1";
		$DB_LOGIN="root";
		$DB_PASSWORD="test";
		$DB_NAME="salary";
		if(!@$conn=mysql_connect($DB_HOST,$DB_LOGIN,$DB_PASSWORD))
		{
			echo $DB_HOST;
			echo 'Error : Cannot connect to database.';
			return("Error : Cannot connect to database.");
		}

		mysql_query("SET NAMES 'UTF8'");
		if(!@mysql_select_db($DB_NAME))
		{
			echo 'Error : Cannot use the table.';
			return("Error : Cannot use the table.");
		}
	}
	public function disconnect()
	{
		mysql_close();
	}
	public function query($qry_str)  {return mysql_query($qry_str);}
	public function num_rows($res)  {return mysql_num_rows($res);}
	public function fetch_row($res)  {return mysql_fetch_row($res);}
	public function fetch_array($res)  {return mysql_fetch_array($res);}
	public function fetch_object($res) {return mysql_fetch_object($res);}
	public function data_seek($res,$num) {return mysql_data_seek($res,$num);}
	public function insert_id() {return mysql_insert_id();}

}

?>