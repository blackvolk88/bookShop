<?php

include_once "MySql.php";
class Payment
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function paymentsAdd($data)
    {
        $res = $this->mysql->insert('payment', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsDelete($where)
    {
        $res = $this->mysql->delete('payment', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsUpdate($id, $payName)
    {
        $data = array('payment_name' => $payName);
        $where = array('id' => $id);
        $res = $this->mysql->update('payment', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsSelectAll()
    {
        $query = "SELECT * FROM payment";
        $res = $this->mysql->select($query);
        return $res;
    }


}