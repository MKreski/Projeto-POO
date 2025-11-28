<?php

namespace unimar\poogames;

use Unimar\Poogames\Midia;

class Serie extends Midia {
    private int $temporadas; // Exclusivo de Série
    private int $episodiosPorTemp;

    public function __construct(string $titulo, string $diretor, string $genero, int $temporadas, int $episodios, int $ano, float $preco) {
        parent::__construct($titulo, $diretor, $genero, $ano, $preco);
        $this->setTemporadas($temporadas);
        $this->setEpisodiosPorTemp($episodios);
    }

    public function Assistir() {
        $totalEps = $this->getTemporadas() * $this->getEpisodiosPorTemp();
        echo "Maratonando a série '{$this->getTitulo()}'. São {$this->getTemporadas()} temporadas com total de {$totalEps} episódios!";
    }

    private function setTemporadas(int $temporadas): void {
        if ($temporadas <= 0) {
            echo "Número de temporadas inválido.";
        }
        else {
            $this->temporadas = $temporadas;
        }
    }

    public function getTemporadas(): int {
        return $this->temporadas;
    }

    private function setEpisodiosPorTemp(int $episodios): void {
        if ($episodios <= 0) {
            echo "Número de episódios inválido.";
        }
        else {
            $this->episodiosPorTemp = $episodios;
        }
    }

    public function getEpisodiosPorTemp(): int {
        return $this->episodiosPorTemp;
    }

    private function atualizarTemporadas(int $novasTemporadas): void {
        $this->setTemporadas($novasTemporadas);
    }

    public function getDados() {
        return "Série: {$this->getTitulo()}, Temporadas: {$this->getTemporadas()}, Preço: R$ {$this->getPreco()}";
    }

    public function Alugar(Cliente $cliente, int $dias) {
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $total = $this->getPreco() * $dias;
            echo "Box da Série '{$this->getTitulo()}' alugado por R${$total}. Boa maratona!";
        }
        else {
            echo "Série '{$this->getTitulo()}' não está disponível para aluguel ou o cliente não pode alugar.";
        }
    }
}