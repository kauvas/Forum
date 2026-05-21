<?php

namespace service;

use dao\mysql\HomeControllerDAO;

class HomeControllerService extends HomeControllerDAO
{
    public function teste()
    {
        return parent::teste();
    }
    public function getPosts()
    {
        return parent::getPosts();
    }
    public function getCategories()
    {
        return parent::getCategories();
    }
    public function getPostsByCategory($categoria)
    {
        return parent::getPostsByCategory($categoria);
    }
}
