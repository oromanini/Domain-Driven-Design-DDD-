<?php

namespace Alura\Arquitetura\Gamificação\Dominio\Selo;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;

class Selo
{
    public function __construct(private readonly Cpf $cpfAluno, private readonly string $nome)
    {
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}