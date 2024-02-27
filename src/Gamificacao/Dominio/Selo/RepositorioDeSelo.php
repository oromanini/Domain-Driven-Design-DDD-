<?php

namespace Alura\Arquitetura\Gamificação\Dominio\Selo;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adicionar(Cpf $cpf, Selo $selo): void;
    public function buscarPorCpf(Cpf $cpf): array;

    /** @return Selo[] */
    public function buscarTodos(): array;
}