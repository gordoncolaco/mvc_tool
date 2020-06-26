<?php
class User extends Controller
{
	protected $tableName;

	function __construct()
	{
		$this->tableName = "user";
		parent::__construct();
	}

	public function login($email, $password)
	{
		$sql = "select a.id_user, a.name, a.email, a.passwd, a.status, ur.code as user_code, ur.name as user_role
				from user a 
				inner join user_roles ur on ur.id_user_role = a.id_user_role
				where a.email = '".Db::getInstance()->escape($email)."' ";

		$row = Db::getInstance()->fetchArray($sql);

		if(count($row) > 0)
		{
			$md5_password = md5($password);

			if($row['passwd'] != $md5_password)
				return "passwordmismatch";
			else if($row['status'] == 0)
				return "inactive";

			$this->sessionobj['user_id'] = $row['id_user'];
			$this->sessionobj['user_name'] = $row['name'];
			$this->sessionobj['user_email'] = $row['email'];
			$this->sessionobj['user_code'] = $row['user_code'];
			$this->sessionobj['user_role'] = $row['user_role'];

			return "success";
		}
		return "usernotfound";
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
