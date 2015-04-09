<?php

include_once 'View/view.php';
include_once 'model/Users.php';

class controller {
    protected $view;
    protected $placeHolders;
    protected $user;

    public function __construct($template = '')
    {
        $this->view = new view($template);
        $this->user = Users::Instance();
    }

    protected function getData(){
        /*if($this->user != null)
            $this->IsExit = "Exit";*/
    }

    protected function setData(){
        $this->view->setReplacement($this->placeHolders);
    }

    public function request(){
        $this->getData();
        $this->setData();
        $this->view->render();
    }
}