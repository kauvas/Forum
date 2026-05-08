<?php

namespace service;

use dao\mysql\PostDAO;

class PostService extends PostDAO
{
    public function getPost($id)
    {
        return parent::getPost($id);
    }
}
