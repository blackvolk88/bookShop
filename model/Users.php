<?php
include_once "MySql.php";

class Users
{
    private static $instance;
    private $msql;
    private $sid;
    private $uid;

    //
    //Реализация патерна Singleton для одной глобальной точки входа.
    public static function Instance()
    {
        if (self::$instance == null)
            self::$instance = new Users();
        return self::$instance;
    }

    private function __construct()
    {
        $this->msql = MySql::getInstance();
        $this->sid = null;
        $this->uid = null;
    }
    //
    //Очистка сессий, если пользователь провел в неактивности более 20 минут.
    public function ClearSessions()
    {
        $timestamp = date("Y-m-d H:i:s", time() - 60 * 20);
        $where = sprintf("time_last < '%s'", $timestamp);
        $this->msql->delete('Session', $where);
    }

    //
    //Получение всей информации о пользователи по полю Login.
    public function GetByLogin($login)
    {
        $query = sprintf("SELECT * FROM users WHERE Email = '%s'", mysql_real_escape_string($login));
        $result = $this->msql->select($query);
        return $result[0];
    }

    //
    //Генерация случайной строки (уникального идентификатора сессис) из 10 символов.
    private function GenerateStr($length = 10)
    {
        $aTemp = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = '';
        $clen = strlen($aTemp) - 1;
        while (strlen($code) < $length)
            $code .= $aTemp[mt_rand(0, $clen)];
        return $code;
    }

    //
    //Открытие сессии.
    public function OpenSession($id_user)
    {
        $sid = $this->GenerateStr(10);
        $now = date("Y-m-d H:i:s");
        $session = array();
        $session['id_user'] = $id_user;
        $session['sid'] = $sid;
        $session['time_start'] = $now;
        $session['time_last'] = $now;
        $this->msql->insert('Session', $session);
        $_SESSION['sid'] = $sid;
        return $sid;
    }

    //
    //Осуществление входа на сайт.
    public function Login($login, $password)
    {
        $user = $this->GetByLogin($login);
        if ($user == null)
            return false;
        $id_user = $user['ID'];
        if ($user['Password'] != md5($password))
            return false;
        $this->sid = $this->OpenSession($user['ID']);
        return true;
    }

    //
    //Осуществление выхода с сайта.
    public function Logout()
    {
        setcookie('Login', '', time() - 1);
        setcookie('Password', '', time() - 1);
        unset($_COOKIE['Login']);
        unset($_COOKIE['Password']);
        unset($_SESSION['sid']);
        $this->sid = null;
        $this->uid = null;
    }

    //
    //Получение уникального идентификатора сессии.
    public function GetSid()
    {
        if ($this->sid != null)
            return $this->sid;
        $sid = $_SESSION['sid'];
        if ($sid != null) {
            $session = array();
            $session['time_last'] = date("Y-m-d H:i:s");
            $where = sprintf("sid = '%s'", mysql_real_escape_string($sid));
            $affected_rows = $this->msql->update('Session', $session, $where);
            if ($affected_rows == 0) {
                $query = sprintf("SELECT count(*) FROM Session WHERE sid = '%s'", mysql_real_escape_string($sid));
                $result = $this->msql->select($query);
                if ($result[0]['count(*)'] == 0)
                    $sid = null;
            }
        }
        if ($sid == null && isset($_COOKIE['Login'])) {
            $user = $this->GetByLogin($_COOKIE['Login']);
            if ($user != null && $user['password'] == $_COOKIE['Password'])
                $sid = $this->OpenSession($user['id_User']);
        }
        if ($sid != null)
            $this->sid = $sid;
        return $sid;
    }

    //
    //Получение уникального идентификатора пользователя.
    public function GetUid()
    {
        if ($this->uid != null)
            return $this->uid;
        $sid = $this->GetSid();
        if ($sid == null)
            return null;
        $query = sprintf("SELECT id_user FROM Session WHERE sid = '%s'", mysql_real_escape_string($sid));
        $result = $this->msql->select($query);
        if (count($result) == 0)
            return null;
        $this->uid = $result[0]['id_user'];
        return $this->uid;
    }

    //
    //Получение пользователя по уникальному идентификатору.
    public function Get($id_user = null)
    {
        if ($id_user == null)
            $id_user = $this->GetUid();
        if ($id_user == null)
            return null;
        $query = sprintf("SELECT * FROM users WHERE ID = %d", $id_user);
        $result = $this->msql->select($query);
        return $result[0];
    }
}