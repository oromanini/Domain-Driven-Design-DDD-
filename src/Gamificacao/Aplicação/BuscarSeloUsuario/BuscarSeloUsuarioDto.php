<?php

namespace Alura\Arquitetura\Gamificacao\Aplicação\BuscarSeloUsuario;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;

class BuscarSeloUsuarioDto
{
    public string $cpf;

    public function __construct(string $cpf)
    {
        $this->cpf = $cpf;
    }
}