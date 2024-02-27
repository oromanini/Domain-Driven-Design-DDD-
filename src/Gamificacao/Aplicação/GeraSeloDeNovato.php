<?php

namespace Alura\Arquitetura\Gamificacao\Aplicação;

use Alura\Arquitetura\Compartilhado\Dominio\Evento\Evento;
use Alura\Arquitetura\Compartilhado\Dominio\Evento\OuvinteDeEvento;
use Alura\Arquitetura\Gamificação\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gamificação\Dominio\Selo\Selo;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    public function __construct(private readonly RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento->nome() === 'aluno_matriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $cpf = $evento->jsonSerialize()['cpfAluno'];
        $selo = new Selo($cpf, 'Novato');

        $this->repositorioDeSelo->adicionar($cpf, $selo);
    }
}