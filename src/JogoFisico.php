<?php

namespace unimar\poogames;

use Unimar\Poogames\Jogo;
use Unimar\Poogames\Console;

class JogoFisico extends Jogo {
    private Console $console; // console onde o jogo físico será jogado   
    private float $custoDanos; // custo para reparo em caso de danos ao jogo físico

    public function __construct(string $Nome, string $Genero, int $ano, float $preco, bool $disponivel, Console $console, float $custoDanos) {
        parent::__construct($Nome, $Genero, $ano, $preco, $disponivel);
        $this->setConsole($console);
        $this->setCustoDanos($custoDanos);
    }

    public function getConsole(): Console {
        return $this->console;
    }

    private function setConsole(Console $console): void {
        $this->console = $console;
    }

    public function getCustoDanos(): float {
        return $this->custoDanos;
    }

    private function setCustoDanos(float $custoDanos): void {
        if ($custoDanos < 0) {
            echo "O custo de danos não pode ser negativo.";
            $this->custoDanos = 0;
        } 
        else {
            $this->custoDanos = $custoDanos;
        }
    }

    public function Jogar() { // só mostra na tela que está jogando o jogo físico
        echo "Jogando o jogo físico: {$this->getNome()} na plataforma {$this->getPlataforma()} no console {$this->console->getModelo()}";
    }

    public function Alugar(cliente $cliente, int $dias) { // Aluga o jogo físico para o cliente por um número de dias
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $precoTotal = $this->getPreco() * $dias;
            echo "Jogo físico {$this->getNome()} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Preço total: R$ {$precoTotal}";
        } else {
            echo "Jogo físico {$this->getNome()} não está disponível para aluguel.";
        }
    }

    public function getDados(): string {
        return "Nome: {$this->getNome()}, Plataforma: {$this->getPlataforma()}, Gênero: {$this->getGenero()}, Ano: {$this->getAno()}, Preço: R$ {$this->getPreco()}, Disponível: " . ($this->getDisponivel() ? 'Sim' : 'Não') . ", Console: {$this->console->getModelo()}, Custo de Danos: R$ {$this->getCustoDanos()}";
    }
}