<?php

namespace unimar\poogames;

abstract class Produto {
    private int $ano;
    private float $preco;
    private bool $disponivel = true;

    protected function __construct(int $ano, float $preco, bool $disponivel = true) {
        $this->setAno($ano);
        $this->setPreco($preco);
        $this->setDisponivel($disponivel);
    }

    public function getAno() : int {
        return $this->ano;
    }

    private function setAno(int $ano) : void {
        $this->ano = $ano;
    }

    public function getPreco() : float {
        return $this->preco;
    }

    private function setPreco(float $preco) : void {
        $this->preco = $preco;
    }

    public function getDisponivel(): bool {
        return $this->disponivel;
    }

    protected function setDisponivel(bool $disponivel): void {
        $this->disponivel = $disponivel;
    }

    abstract public function getDados();

    abstract public function Alugar(cliente $cliente, int $dias);
    // nessa parte só vai pegar o cliente pq da tanto pra alugar jogo como console, (até por isso q é uma função abstrata né)

}