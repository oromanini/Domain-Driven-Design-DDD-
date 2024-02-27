<?php

namespace Alura\Arquitetura\Gamificacao\Aplicação\BuscarSeloUsuario;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;
use Alura\Arquitetura\Gamificação\Dominio\Selo\RepositorioDeSelo;

class BuscaSelo
{
    public function __construct(private readonly RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function executa(BuscarSeloUsuarioDto $dados)
    {
        $cpfAluno = new Cpf($dados->cpfAluno);
        $selos = $this->repositorioDeSelo->buscarPorCpf($cpfAluno);

        return $selos;
    }
}