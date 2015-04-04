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
        $resOrdI = $this->mysql->insert('orderitems', $dataOrdersItems);
        if($resOrd && $resOrdI)
            return true;
        else
            return false;
    }

    public function orderDelete($orderId)
    {
        $resOrd = $this->mysql->delete('orders', $orderId);
        $resOrdId = $this->mysql->delete('orderitems', $orderId);
        if($resOrd && $resOrdId)
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

    public function getOrderByUserId($userId)
    {
        $query = "SELECT * FROM orders WHERE user_id='$userId'";
        $res = $this->mysql->select($query);
        foreach($res as $key=>&$val)
        {
            $query="SELECT * FROM orderitems WHERE order_id='{$val['order_id']}'";
            $result = $this->mysql->select($query);
            $val['orderId'] = $result;
        }
        return $res;
    }
}
?>