<?php

namespace Controllers;

use Contracts\IModel;

class Home
{
    protected IModel $model;
    public function __construct(IModel $model)
    {
        $this->model = $model;
    }

    public function run()
    {

        $articles = $this->model->all();
        echo "<h1>HOME PAGE</h1>";

        foreach ($articles as $key => $article) {
            echo "<h2>{$article["id"]} : {$article["title"]}</h2><hr/>";
        }
    }
}
