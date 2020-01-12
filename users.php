<?php
/**
 * 
 */
class Users
{
	private $conn;
	private $table_name="users";

	public $id;
	public $uname;
	public $password;
	function __construct($db)
	{
		
	}
	$query="SELECT * from ".$this->table_name." WHERE unam=:uname,password=:md5(password)";

	
}
?>