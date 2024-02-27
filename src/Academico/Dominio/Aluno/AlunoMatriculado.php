<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Compartilhado\Dominio\Cpf;
use Alura\Arquitetura\Compartilhado\Dominio\Evento\Evento;

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

    public function nome(): string
    {
        return 'aluno_matriculado';
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}