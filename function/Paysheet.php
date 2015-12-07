<?php
class Paysheet
{
	//Mysql connection
	private $db;
	//Execute result
	private $Result;
	//rows number of result
	private $Rows;

	//Database fields
	public $Account;
	public $FileName;

	public function __construct($db)
	{
		$this->db=$db;
	}
	
	public function Insert($account, $date, $fileName)
	{
		$sql = 'INSERT INTO `pay_sheet` (`account`, `date`, `file_name`) VALUES (\''.$account.'\',\''.$date.'\',\''.$fileName.'\');';
		$this->db->query($sql);
	}
	public function GetByAccount($account)
	{
		$sql = 'SELECT * FROM  `pay_sheet` WHERE `account`=\''.$account.'\' ORDER BY `date` DESC ';
		$this->Result=$this->db->query($sql);
		$this->Rows=$this->db->num_rows($this->Result);
	}
	
	public function GetAll()
	{
		$sql = 'SELECT * FROM  `pay_sheet` ORDER BY `account` DESC ';
		$this->Result=$this->db->query($sql);
		$this->Rows=$this->db->num_rows($this->Result);
	}
	
	public function Update($account,$fileName)
	{
		$sql = 'UPDATE `pay_sheet` SET `file_name`=\''.$fileName.'\' WHERE `account`=\''.$account.'\' ';
		$this->db->query($sql);
	}
	
	public function HasNext()
	{
		if($this->Rows>0)
		{
			$temp=$this->db->fetch_array($this->Result);
			$this->Account=$temp['account'];
			$this->FileName=$temp['file_name'];
			$this->Rows--;
			return true;
		}
		return false;
	}
}
?>