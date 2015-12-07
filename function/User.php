<?php
class User
{
	//Mysql connection
	private $db;
	//Execute result
	private $Result;
	//rows number of result
	private $Rows;

	//Database fields
	public $UserAccount;
	public $UserPassword;

	public function __construct($db)
	{
		$this->db=$db;
	}
	
	public function IsAccountUsed($account)
	{
		$sql = 'SELECT * FROM `user` WHERE `account` = \''.$account.'\' ';
		$result=$this->db->query($sql);
		$rows=$this->db->num_rows($result);
		if($rows==1)
		{
			return true;
		}else
		{
			return false;
		}
	}
	
	public function Login($account,$password)
	{
		$sql = 'SELECT * FROM `user` WHERE `account` = \''.$account.'\' and `pw`=\''.$password.'\' ';
		$result=$this->db->query($sql);
		$rows=$this->db->num_rows($result);
		if($rows==1)
		{
			$temp=$this->db->fetch_array($result);
			//$_SESSION['UserAccount']=$temp['user_account'];
			$_SESSION['Account']=$temp['account'];
			return true;
		}else
		{
			return false;
		}
	}
	
	public function Insert($account,$password)
	{
		$sql = 'INSERT INTO `user` (`account`,`pw`) VALUES (\''.$account.'\',\''.$password.'\');';
		$this->db->query($sql);
	}
	public function GetAll()
	{
		$sql = 'SELECT * FROM  `user` ORDER BY   `user_account` DESC ';
		$this->Result=$this->db->query($sql);
		$this->Rows=$this->db->num_rows($this->Result);
	}
	
	public function UpdatePassword($account,$password)
	{
		$sql = 'UPDATE `user` SET `pw`=\''.$password.'\' WHERE `account`=\''.$account.'\' ';
		$this->db->query($sql);
	}
	
	public function HasNext()
	{
		if($this->Rows>0)
		{
			$temp=$this->db->fetch_array($this->Result);
			$this->UserAccount=$temp['account'];
			$this->UserPassword=$temp['pw'];
			$this->Rows--;
			return true;
		}
		return false;
	}
    
    
}
?>