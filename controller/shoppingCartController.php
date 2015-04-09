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
        if ($_GET['sub'] == 'view')
            parent::__construct('Basket');
        else
            parent::__construct();
        $this->shoppingCartModel = new ShoppingCart();
        $this->bookModel = new CatalogBooks();
    }

    public function getData()
    {
        parent::getData();
        $this->user = $this->user->Get();
        if (empty($this->user)) {
            header("Location: index.php?action=Login");
            die;
        }
        if ($_GET['sub'] == 'view') {
            $cart = $this->shoppingCartModel->getBasketByUserId($this->user['ID']);
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
    }

    public function setData()
    {
        if ($_GET['sub'] == 'add') {
            $cart = $this->shoppingCartModel->getBasketByUserId($this->user['ID']);
            $flag = false;
            foreach ($cart as $val) {
                if ($val['BookID'] == $_GET['id']) {
                    $count = $val['Count'] + 1;
                    $this->shoppingCartModel->updateCart($count, $val['BookID'], $this->user['ID']);
                    $flag = true;
                }
            }
            if (!$flag) {
                $this->shoppingCartModel->addToCart(
                    array(
                        'UserID' => $this->user['ID'],
                        'BookID' => $_GET['id'],
                        'Count' => 1
                    )
                );
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        parent::setData();
    }
}