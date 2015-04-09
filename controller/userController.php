<?php
session_start();
include_once 'controller.php';

class userController extends controller
{

    public function __construct()
    {
        parent::__construct('login');
    }

    public function getData()
    {
        parent::getData();
        /*$this->placeHolders = array(
            '<%BOOKID%>' => $books[0]['ID'],
            '<%BOOKNAME%>' => $books[0]['Name'],
            '<%BOOKDESCRIPTION%>' => $books[0]['Description'],
            '<%BOOKPRICE%>' => $books[0]['Price']
        );*/
    }

    public function setData()
    {
        parent::setData();
    }
}