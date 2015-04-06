<?php

    require_once 'controller/AuthorController.php';
    require_once 'controller/BasketController.php';
    require_once 'controller/BookController.php';
    require_once 'controller/GenreController.php';
    require_once 'controller/OrderController.php';
    require_once 'controller/UsersController.php';

    if(isset($_POST['Login_Submit']))
    {
        $user = $Users->Login($_POST['Login'], $_POST['Password']);
        if(!empty($user))
            header("Location: index.php");
    }

    switch($_GET['action'])
    {
        case 'Registration':
            $controller = new UsersController();
            break;
        case 'Login':
            $controller = new UsersController();
            break;
        case 'Discription':
            $controller = new BookController();
            break;
        case 'AddBasket':
            $controller = new UsersController();
            break;
        case 'Checkout':
            $controller = new UsersController();
            break;

    }
$controller->Request();
?>