<?php

include_once 'config.php';

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
        $aTemp = array();

        $result = mysql_query($query) or die (mysql_error());
        $n = mysql_num_rows($result);

        for ($i = 0; $i < $n; $i++)
        {
            $row = mysql_fetch_assoc($result);
            $aTemp[] = $row;
        }

        return $aTemp;
    }

    public function insert($table, $object)
    {
        $columns = array();
        $values = array();

        foreach ($object as $key => $value)
        {
            $key = mysql_real_escape_string($key . '');
            $columns[] = $key;


            if ($value === null)
                $values[] = 'NULL';
            else {
                $value = mysql_real_escape_string($value . '');
                $values[] = "'$value'";
            }
        }

        $sColumns = implode(',', $columns);
        $sValues = implode(',', $values);

        $t = "INSERT INTO $table($sColumns) VALUES($sValues)";
        @mysql_query($t) or die (mysql_error());
        return mysql_insert_id();
    }

    public function update($table, $object, $where)
    {
        if ($table == 'shoppingCart')
            var_dump($table, $object, $where);
        exit;
        $aTemp = array();

        foreach ($object as $key => $value)
        {
            $key = mysql_real_escape_string($key . '');
            if ($value === null)
                $aTemp[] = "$key = 'NULL'";
            else {
                $value = mysql_real_escape_string($value . '');
                $aTemp[] = "$key = '$value'";
            }
        }

        $sTemp = implode(',', $aTemp);
        $query = "UPDATE $table SET $sTemp WHERE $where";
        if ($table == 'shoppingCart')
            var_dump($query);
        exit;
        @mysql_query($query) or die (mysql_error());
        return mysql_affected_rows();
    }

    public function delete($table, $where)
    {
        $query = "DELETE FROM $table WHERE $where";
        mysql_query($query);
        return mysql_affected_rows();

    }
}



?>