<?php

namespace template;

interface Itemplate
{
    public function cabecalho();
    public function layout($caminho, $parametro = null);
}