<?php

include_once 'View/view.php';

class controller {
    protected $view;
    protected $placeHolders;
    public function __construct($template){
        $this->view = new view($template);
    }

    protected function getData(){

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