<?php
/*error_reporting(-1) ; // включить все виды ошибок, включая  E_STRICT
ini_set('display_errors', 'On');  // вывести на экран помимо логов*/

include_once 'controller/mainPageController.php';

/*if(isset($_POST['Login_Submit']))
{
    $user = $Users->Login($_POST['Login'], $_POST['Password']);
    if(!empty($user))
        header("Location: index.php");
}

switch($_GET['action'])
{
    /*case 'Registration':
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
        break;*/
/*    default:
        $controller = new mainPageController();
        var_dump('asd');exit;

}*/
$controller = new mainPageController();
$controller->Request();
?>