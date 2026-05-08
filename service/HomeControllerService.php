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
}
