<?php
class Role extends Controller
{
	protected $tableName;

	function __construct()
	{
		$this->tableName = "user_roles";
		parent::__construct();
	}

	public function getAllRolesByCode($rolecode)
	{
		$sql = "select id_user_role from user_roles where code='".$rolecode."'";
		$row = Db::getInstance()->fetchArray($sql);

		if(count($row) > 0)
		{

			return $row['id_user_role'];
		}
	}
	
	public function getAllRoles()
	{
		$sql = "select * from user_roles";
		$row = Db::getInstance()->fetchRows($sql);

		if(count($row) > 0)
		{

			return $row;
		}
	}
	
	public function addRole($fields)
	{	
	
	
		$id= Db::getInstance()->insertTableData('user_roles', $fields);
		
		if($id > 0)
		{
			return "success";
		}
		return "error";
	}
}

?>
