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
        $res = $this->mysql->insert('paymentMethods', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('paymentMethods', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsUpdate($id, $payName)
    {
        $data = array('Name' => $payName);
        $where = array('id' => $id);
        $res = $this->mysql->update('paymentMethods', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function paymentsSelectAll()
    {
        $query = "SELECT * FROM paymentMethods";
        $res = $this->mysql->select($query);
        return $res;
    }


}