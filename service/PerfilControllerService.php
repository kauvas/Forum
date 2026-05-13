<?php

namespace service;

use dao\mysql\PerfilControllerDAO;

class PerfilControllerService extends PerfilControllerDAO
{
    public function getPostsID($usuario_id)
    {
        return parent::getPostsID($usuario_id);
    }
}
