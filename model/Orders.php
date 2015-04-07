<?php

include_once "MySql.php";
class Orders
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function orderAdd($dataOrders, $dataOrdersItems)
    {
        $resOrd = $this->mysql->insert('orders', $dataOrders);
        $resOrdI = $this->mysql->insert('orderItems', $dataOrdersItems);
        if($resOrd && $resOrdI)
            return true;
        else
            return false;
    }

    public function orderDelete($orderId)
    {
        $whereOrd = array('id' => $orderId);
        $whereOrdI = array('OrderID' => $orderId);
        $resOrd = $this->mysql->delete('orders', $whereOrd);
        $resOrdId = $this->mysql->delete('orderItems', $whereOrdI);
        if($resOrd && $resOrdId)
            return true;
        else
            return false;
    }

    public function orderUpdate($statusName, $id)
    {
        $where = array('id' => $id);
        $data = array('Status' => $statusName);
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

    public function getOrderByUserId($userId)
    {
        $query = "SELECT * FROM orders WHERE UserID='$userId'";
        $res = $this->mysql->select($query);
        foreach($res as $key=>&$val)
        {
            $query="SELECT * FROM orderitems WHERE OrderID='{$val['OrderID']}'";
            $result = $this->mysql->select($query);
            $val['OrderID'] = $result;
        }
        return $res;
    }
}
?>