<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;

class MatricularAluno
{
    private RepositorioDeAluno $repositorioDeAluno;
    private PublicadorDeEvento $publicador;

    public function __construct(RepositorioDeAluno $repositorioDeAluno)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
        $this->publicador = new PublicadorDeEvento();
        $this->publicador->adicionarOuvinte(new LogAlunoMatriculado());
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repositorioDeAluno->adicionar($aluno);

        $this->publicador->publicar(new AlunoMatriculado($aluno->cpf()));
    }
}
