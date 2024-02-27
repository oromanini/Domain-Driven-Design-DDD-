<?php

namespace Alura\Arquitetura\Gamificação\Infra\Selo;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;
use Alura\Arquitetura\Gamificação\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gamificação\Dominio\Selo\Selo;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{

    private array $selos = [];

    public function adicionar(Cpf $cpf, Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function buscarPorCpf(Cpf $cpf): array
    {
        return array_filter($this->selos, fn (Selo $selo) => $selo->cpfAluno());
    }

    public function buscarTodos(): array
    {
        return $this->selos;
    }
}