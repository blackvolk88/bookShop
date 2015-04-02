<?php

include_once "MySql.php";
class Users
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }
	
	
?>