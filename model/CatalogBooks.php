<?php

include_once "MySql.php";
class CatalogBooks
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function catalogsAdd($data)
    {
        $res = $this->mysql->insert('catalogbooks', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function catalogsDelete($where)
    {
        $res = $this->mysql->delete('catalogbooks', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function catalogsUpdate($where, $data)
    {
        $res = $this->mysql->update('catalogbooks', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function catalogsSelectAll()
    {
        $query = "SELECT * FROM catalogbooks";
        $res = $this->mysql->select($query);
        return $res;
    }


}