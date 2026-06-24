<?php

namespace dao\mysql;

use generic\MysqlFactory;

class HomeControllerDAO extends MysqlFactory
{
    public function getPosts($t)
    {
        $sql = "";
        if ($t == 0) {
            $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id";
        }
        if ($t == 1) {
            $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id order by data desc";
        }
        if ($t == 2) {
            $sql = "SELECT 
                p.*, 
                u.nome as nome_usuario,
                COUNT(i.interacao_id) AS total_votos
                FROM posts p
                INNER JOIN usuarios u ON p.usuario_id = u.id
                LEFT JOIN interacoes i ON p.post_id = i.post_id and i.tipo = 1
                GROUP BY p.post_id, u.nome
                ORDER BY total_votos desc";
        }
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function getCategories()
    {
        $sql = "SELECT categoria, COUNT(*) as total_posts FROM posts GROUP BY categoria ORDER BY categoria";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function getPostsByCategory($categoria, $t)
    {
        $sql = '';
        if ($t == 0) {
            $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id where p.categoria = :categoria";
            $param = [
                ":categoria" => $categoria,
            ];
        }
        if ($t == 1) {
            $sql = "select p.*, u.nome as nome_usuario from posts p left join usuarios u on p.usuario_id = u.id where p.categoria = :categoria order by p.data desc";
            $param = [
                ":categoria" => $categoria,
            ];
        }
        if ($t == 2) {
            $sql = "SELECT 
                    p.*, 
                    u.nome AS nome_usuario,
                    COUNT(i.interacao_id) AS total_votos
                    FROM posts p
                    LEFT JOIN usuarios u ON p.usuario_id = u.id 
                    LEFT JOIN interacoes i ON p.post_id = i.post_id 
                    WHERE p.categoria = :categoria
                    GROUP BY p.post_id, u.nome
                    ORDER BY total_votos DESC";
        }
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

    public function getInteracoes($post_id)
    {
        $sql = "select count(*) as total from interacoes where post_id = :post_id group by tipo";
        $param = [
            ":post_id" => $post_id,
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}
