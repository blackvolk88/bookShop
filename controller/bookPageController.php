<?php
session_start();
include_once 'model/CatalogBooks.php';
include_once 'controller.php';


class bookPageController extends controller {

    private $bookModel;

    public function __construct()
    {
        parent::__construct('description');
        $this->bookModel = new CatalogBooks();
    }

    public function getData()
    {
        parent::getData();
        $books = $this->bookModel->getBookById($_GET['id']);
        $this->placeHolders = array(
            '<%BOOKID%>' => $books[0]['ID'],
            '<%BOOKNAME%>' => $books[0]['Name'],
            '<%BOOKDESCRIPTION%>' => $books[0]['Description'],
            '<%BOOKPRICE%>' => $books[0]['Price']
        );
    }

    public function setData()
    {
        parent::setData();
    }
}