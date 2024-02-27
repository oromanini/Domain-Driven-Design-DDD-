<?php

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Alura\Arquitetura\Compartilhado\Dominio\Evento\PublicadorDeEvento;
use Alura\Arquitetura\Gamificacao\Aplicação\GeraSeloDeNovato;
use Alura\Arquitetura\Gamificação\Infra\Selo\RepositorioDeSeloEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$usecase = new MatricularAluno(
    new RepositorioDeAlunoEmMemoria()
);

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloDeNovato(
    new RepositorioDeSeloEmMemoria()
));

$usecase->executa(new MatricularAlunoDto($cpf, $nome, $email));