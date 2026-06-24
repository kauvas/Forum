<?php

namespace service;

use dao\mysql\HomeControllerDAO;

class HomeControllerService extends HomeControllerDAO
{
    public function getPosts($t)
    {
        return parent::getPosts($t);
    }
    public function getCategories()
    {
        return parent::getCategories();
    }
    public function getPostsByCategory($categoria, $t)
    {
        return parent::getPostsByCategory($categoria, $t);
    }
    public function getCountComentarios($post_id)
    {
        return parent::getCountComentarios($post_id);
    }
    public function getInteracoes($post_id)
    {
        return parent::getInteracoes($post_id);
    }
}
