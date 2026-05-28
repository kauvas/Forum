<?php

namespace service;

use dao\mysql\PerfilControllerDAO;

class PerfilControllerService extends PerfilControllerDAO
{
    public function getPostsID($usuario_id)
    {
        return parent::getPostsID($usuario_id);
    }

    public function getComentarios($usuario_id)
    {
        return parent::getComentarios($usuario_id);
    }
}
