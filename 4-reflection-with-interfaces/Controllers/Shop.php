<?php

namespace Controllers;

use Contracts\IModel;
use Contracts\IStorage;
use Models\Article;
use Utils\Session;

class Shop
{
    protected Article $model;
    protected Session $session;
    public function __construct(IModel $model, IStorage $session)
    {
        $this->model = $model;
        $this->session = $session;
        session::set("test", 123123123123123);
    }
    public function run()
    {

        $articles = $this->model->all();
        echo "<h1>SHOP PAGE</h1>";

        $val =  session::get("test");
        foreach ($articles as $key => $article) {
            echo "<h2>{$article["id"]} : {$article["title"]}</h2><hr/>";
        }
        echo "<h2>{$val}</h2><hr/>";
    }
}
