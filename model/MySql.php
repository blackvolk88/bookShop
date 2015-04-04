<?php

class MySql
{
    private static $instance = null;

    private function __construct()
    {
        mysql_connect(HOST, USER, PASS) or die(mysql_error());
        mysql_select_db(DB_NAME) or die(mysql_error());
    }

    static public function getInstance() {
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function select($query)
    {
        $result = mysql_query($query);
        if (!$result) {
            die('Bad Request: ' . mysql_error());
        }
        while ($row = mysql_fetch_assoc($result))
        {
            $res[] = $row;
        }
        return $res;
    }

    public function insert($table, $data)
    {
        $fields = "`" . implode("`,`", array_keys($data)) . "`";
        $values = "'" . implode("','", $data) . "'";
        $query = "INSERT INTO " . $table . " (" . $fields . ") " . "VALUES" . " (" . $values . ")";
        mysql_query($query) or die (mysql_error());
        return mysql_insert_id();
    }

    public function update($table, $where, $data)
    {
        // 'key1'='val', 'key2'='val'

        $strData = "";
        $strWhere = "";
        foreach($data as $key=>$val)
        {
            $strData .= "`" . $key . "`" . "=" . "'" . $val . "'" . ",";
        }
        $strData = substr($strData, 0 , -1);

        foreach($where as $key=>$val)
        {
            $strWhere .= "`" . $key . "`" . "=" . "'" . $val . "'" . " AND ";
        }
        $strWhere = substr($strWhere, 0 , -5);

        $query = "UPDATE " . $table . " SET " . $strData . " WHERE " . $strWhere;
        mysql_query($query) or die (mysql_error());
    }

    public function delete($table, $where)
    {
        $strWhere = "";
        foreach($where as $key=>$val)
        {
            $strWhere .= "`" . $key . "`" . "=" . "'" . $val . "'" . " AND ";
        }
        $strWhere = substr($strWhere, 0, -5);

        $query = "DELETE FROM " . $table . " WHERE " . $strWhere;
        mysql_query($query) or die (mysql_error());

    }
}



?>