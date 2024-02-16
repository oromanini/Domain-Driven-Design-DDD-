<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$usecase = new MatricularAluno(
    new RepositorioDeAlunoEmMemoria()
);

$usecase->executa(new MatricularAlunoDto($cpf, $nome, $email));