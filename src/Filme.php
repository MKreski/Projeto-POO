<?php

namespace unimar\poogames;

class Filme extends Midia {
    private int $duracaoMinutos; // Exclusivo de Filme

    public function __construct(string $titulo, string $diretor, string $genero, int $duracao, int $ano, float $preco) {
        parent::__construct($titulo, $diretor, $genero, $ano, $preco);
        $this->setDuracaoMinutos($duracao);
    }

    public function Assistir() {
        echo "Assistindo ao filme '{$this->getTitulo()}'. Prepare a pipoca por {$this->getDuracaoMinutos()} minutos!";
    }

    private function setDuracaoMinutos(int $duracao): void {
        $this->duracaoMinutos = $duracao;
    }

    public function getDuracaoMinutos(): int {
        return $this->duracaoMinutos;
    }

    // Implementação obrigatória do Produto
    public function getDados() {
        return "Filme: {$this->titulo}, Diretor: {$this->diretor}, Duração: {$this->duracaoMinutos}min, Preço: R$ {$this->getPreco()}";
    }

    public function Alugar(Cliente $cliente, int $dias) {
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $total = $this->getPreco() * $dias;
            echo "Filme '{$this->titulo}' alugado por {$dias} dias. Total: R$ {$total}";
        }
        else {
            echo "Filme '{$this->titulo}' não está disponível para aluguel ou o cliente não pode alugar.";
        }
    }
}