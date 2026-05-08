<?php

namespace dao\mysql;

//use dao\IPost]DAO;
use generic\MysqlFactory;

class PostDAO extends MysqlFactory /*implements IPostDAO*/
{
    public function Perfil()
    {
        $sql = "select * from forum";
        $param = [
            "",
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    public function getPost($id)
    {
        $sql = "select * from posts where post_id = :post_id";
        $param = [
            ":post_id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
