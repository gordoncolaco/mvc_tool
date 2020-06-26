<?php
class Admin extends Controller
{
	protected $tableName;

	function __construct()
	{
		$this->tableName = "user";
		parent::__construct();
	}

	public function getAllAdmin()
	{
		$sql = "select a.id_user, a.name, a.email, a.passwd, a.status, ur.code as user_code, ur.name as user_role
				from user a 
				inner join user_roles ur on ur.id_user_role = a.id_user_role
				where ur.code='admin'";
		$row = Db::getInstance()->fetchRows($sql);

		if(count($row) > 0)
		{

			return $row;
		}
	}
	
	public function register($fields)
	{	
	
	
		$id= Db::getInstance()->insertTableData('user', $fields);
		
		if($id > 0)
		{
			return "success";
		}
		return "error";
	}
	
	public function checkemail($email)
	{
		
		$sql = "select a.id_user
				from user a
				where a.email = '".Db::getInstance()->escape($email)."' ";

		$row = Db::getInstance()->fetchRows($sql);
		if(count($row) > 0)
			return "emailexists";
		else
			return "success";
	}
}

?>
