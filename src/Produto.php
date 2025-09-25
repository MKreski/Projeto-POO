<?php

namespace unimar\poogames;

abstract class Produto {
    protected int $ano;
    protected float $preco;
    protected bool $disponivel = true;

    public function isDisponivel(): bool {
        return $this->disponivel;
    }

    abstract public function getDados();

    abstract public function Alugar(cliente $cliente, int $dias);
    // nessa parte só vai pegar o cliente pq da tanto pra alugar jogo como console, (até por isso q é uma função abstrata né)
}