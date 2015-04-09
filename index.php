<?php
/*error_reporting(-1) ; // включить все виды ошибок, включая  E_STRICT
ini_set('display_errors', 'On');  // вывести на экран помимо логов*/
error_reporting(0) ;
include_once 'controller/mainPageController.php';
include_once 'controller/bookPageController.php';
include_once 'controller/shoppingCartController.php';

/*if(isset($_POST['Login_Submit']))
{
    $user = $Users->Login($_POST['Login'], $_POST['Password']);
    if(!empty($user))
        header("Location: index.php");
}*/

switch($_GET['action'])
{
    case 'Registration':
        $controller = new UsersController();
        break;
    case 'Login':
        $controller = new UsersController();
        break;
    case 'description':
        $controller = new bookPageController();
        break;
    case 'shoppingcart':
        $controller = new shoppingCartController();
        break;
    case 'Checkout':
        $controller = new UsersController();
        break;
    default:
        $controller = new mainPageController();
}
$controller->Request();
?>