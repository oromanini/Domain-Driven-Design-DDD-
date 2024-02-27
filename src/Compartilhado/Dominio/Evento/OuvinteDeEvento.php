<?php

namespace Alura\Arquitetura\Compartilhado\Dominio\Evento;

abstract class OuvinteDeEvento
{
    public function processa(Evento $evento): void
    {
        if ($this->saibaProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

    abstract public function sabeProcessar(Evento $evento): bool;
    abstract public function reageAo(Evento $evento): void;
}