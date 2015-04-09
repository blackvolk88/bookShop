<?php

include_once 'model/Authors.php';
include_once 'model/Genres.php';
include_once 'model/CatalogBooks.php';
include_once 'controller.php';

class mainPageController extends controller{

    private $bookModel;
    private $authorModel;
    private $genreModel;

    public function __construct(){
        parent::__construct('index');
        $this->authorModel = new Authors();
        $this->genreModel = new Genres();
        $this->bookModel = new CatalogBooks();
    }

    public function getData(){
        parent::getData();
        $authors = $this->authorModel->authorsSelectAll();
        $genres = $this->genreModel->genresSelectAll();
        $books = $this->bookModel->bookSelectAll();
        $internalAuthorContent = '';
        $internalGenreContent = '';
        $internalBookContent = '';
        foreach($authors as $val){
            $internalAuthorContent .= $this->view->renderInternalContent(
                'author_list',
                array(
                    '<%AUTHOR_LINK%>' => 'index.php?sort=Author&ID=' . $val['ID'],
                    '<%AUTHOR_NAME%>' => $val['FullName']
                ))
            ;
        }
        foreach($genres as $val){
            $internalGenreContent .= $this->view->renderInternalContent(
                'genres_list',
                array(
                    '<%GENRE_LINK%>' => 'index.php?sort=Genre&ID=' . $val['ID'],
                    '<%GENRE_NAME%>' => $val['Name']
                ))
            ;
        }
        foreach($books as $val){
            $internalBookContent .= $this->view->renderInternalContent(
                'book_short',
                array(
                    '<%BOOKNAME%>' => $val['Name'],
                    '<%BOOKDESCRIPTION%>' => $val['Description'],
                    '<%BOOKPRICE%>' => $val['Price'],
                    '<%BOOKID%>' => $val['ID']
                ))
            ;
        }
        $this->placeHolders = array(
            '<%AUTHORS%>' => $internalAuthorContent,
            '<%GENRES%>' => $internalGenreContent,
            '<%BOOKS%>' => $internalBookContent
        );
    }

    public function setData(){
        parent::setData();
    }
}