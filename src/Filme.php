<?php

namespace unimar\poogames;

use Unimar\Poogames\Midia;

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
        if ($duracao <= 0) {
            echo "Duração inválida.";
        }
        else {
            $this->duracaoMinutos = $duracao;
        }
    }

    public function getDuracaoMinutos(): int {
        return $this->duracaoMinutos;
    }

    public function getDados() {
        return "Filme: {$this->getTitulo()}, Diretor: {$this->getDiretor()}, Duração: {$this->getDuracaoMinutos()}min, Preço: R$ {$this->getPreco()}";
    }

    public function Alugar(Cliente $cliente, int $dias) {
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $total = $this->getPreco() * $dias;
            echo "Filme '{$this->getTitulo()}' alugado por {$dias} dias. Total: R$ {$total}";
        }
        else {
            echo "Filme '{$this->getTitulo()}' não está disponível para aluguel ou o cliente não pode alugar.";
        }
    }
}