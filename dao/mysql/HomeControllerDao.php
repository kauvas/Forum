<?php

namespace dao\mysql;

//use dao\IHomeControllerDAO;
use generic\MysqlFactory;

class HomeControllerDAO extends MysqlFactory /*implements IHomeControllerDAO*/
{     
    public function teste()
    {
        $sql = "select * from forum";
        $param = [
            "",
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getPosts()
    {
        $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function getCategories()
    {
        $sql = "SELECT categoria, COUNT(*) as total_posts FROM posts GROUP BY categoria ORDER BY categoria";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function getPostsByCategory($categoria)
    {
        $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id where p.categoria = :categoria";
        $param = [
            ":categoria" => $categoria,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function getCountComentarios($post_id)
    {
        $sql = "SELECT COUNT(*) as total_comentarios FROM comentarios WHERE post_id = :post_id";
        $param = [
            ":post_id" => $post_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
