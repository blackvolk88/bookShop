<?php

include_once 'model/ShoppingCart.php';
include_once 'model/CatalogBooks.php';
include_once 'controller.php';


class shoppingCartController extends controller
{

    private $shoppingCartModel;
    private $bookModel;

    public function __construct()
    {
        parent::__construct('Basket');
        $this->shoppingCartModel = new ShoppingCart();
        $this->bookModel = new CatalogBooks();
    }

    public function getData()
    {
        parent::getData();
        $cart = $this->shoppingCartModel->getBasketByUserId(1);
        $internalContent = '';
        $total = 0;
        foreach ($cart as $val) {
            $book = $this->bookModel->getBookById($val['BookID']);
            $internalContent .= $this->view->renderInternalContent(
                'cart_list',
                array(
                    '<%BOOKNAME%>' => $book[0]['Name'],
                    '<%BOOKDESCRIPTION%>' => $book[0]['Description'],
                    '<%BOOKPRICE%>' => $book[0]['Price'],
                    '<%BOOKCOUNT%>' => $val['Count'],
                    '<%BOOKSUBTOTAL%>' => $book[0]['Price'] * $val['Count']
                ));
            $total += $book[0]['Price'] * $val['Count'];
        }

        $this->placeHolders = array(
            '<%CONTENT%>' => $internalContent,
            '<%TOTAL%>' => $total
        );
    }

    public function setData()
    {
        parent::setData();
    }
}