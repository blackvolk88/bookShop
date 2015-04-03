<?php

include_once "MySql.php";
class Users
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }
	
	public function orderAdd($data)
	{
		$res = $this->mysql->insert('orders', $data);
		if($res)
            return true;
        else
            return false;
	}
	
	public function orderDelete($where)
	{
		$res = $this->mysql->insert('orders', $where);
		if($res)
            return true;
        else
            return false;
	}
	
	public function orderUpdate($statusName, $id)
	{
		$where = array('id' => $id);
		$data = array('status_name' => $statusName);
		$res = $this->mysql->update('orders', $where, $data);
		if($res)
            return true;
        else
            return false;
	}
	
	public function ordersSelectAll()
	{
		$query = "SELECT * FROM orders";
		$res = $this->mysql->select($query);
		return $res;
	}
	
	public function getOrderById($id)
	{
		$query = "SELECT * FROM orders WHERE id= '$id'";
		$res = $this->mysql->select($query);
		return $res;
	}
	
	public function getOrderByUser()
}
?>