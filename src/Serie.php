<?php

namespace unimar\poogames;

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
        $this->temporadas = $temporadas;
    }

    public function getTemporadas(): int {
        return $this->temporadas;
    }

    private function setEpisodiosPorTemp(int $episodios): void {
        $this->episodiosPorTemp = $episodios;
    }

    public function getEpisodiosPorTemp(): int {
        return $this->episodiosPorTemp;
    }

    public function getDados() {
        return "Série: {$this->titulo}, Temporadas: {$this->temporadas}, Preço: R$ {$this->getPreco()}";
    }

    public function Alugar(Cliente $cliente, int $dias) {
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $total = $this->getPreco() * $dias;
            echo "Box da Série '{$this->titulo}' alugado. Boa maratona!";
        }
        else {
            echo "Série '{$this->titulo}' não está disponível para aluguel ou o cliente não pode alugar.";
        }
    }
}