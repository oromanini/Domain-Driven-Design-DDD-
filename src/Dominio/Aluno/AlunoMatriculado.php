<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Evento;

class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;
    public function __construct(private readonly Cpf $cpf)
    {
        $this->momento = new \DateTimeImmutable();
    }

    public function momento(): \DateTimeImmutable
    {
        return $this->momento;
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpf;
    }
}