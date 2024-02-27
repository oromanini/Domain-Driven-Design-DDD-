<?php

namespace Alura\Arquitetura\Compartilhado\Dominio\Evento;

interface Evento extends \JsonSerializable
{
    public function momento(): \DateTimeImmutable;
    public function nome(): string;
}