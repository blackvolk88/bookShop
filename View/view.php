<?php

class view {
    protected $content;
    protected $placeHolders;

    public function __construct($template){
        $this->content = file_get_contents('templates/' . $template . '.html');
    }

    public function setReplacement($data){
        foreach($data as $key => $value){
            $this->placeHolders[$key] = $value;
        }
    }

    public function render(){
        $search = array_keys($this->placeHolders);
        $replace = $this->placeHolders;
        echo str_replace($search, $replace, $this->content);
    }

    public function renderInternalContent($template, $dataToReplace){
        $content = file_get_contents('templates/' . $template . '.html');
        $search = array_keys($dataToReplace);
        $replace = $dataToReplace;
        return str_replace($search, $replace, $content);
    }
}