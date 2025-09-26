<?php

namespace unimar\poogames;

use Unimar\Poogames\Jogo;
use Unimar\Poogames\Console;

class JogoFisico extends Jogo {
    protected Console $console; // console onde o jogo físico será jogado   
    protected float $custoDanos; // custo para reparo em caso de danos ao jogo físico

    public function __construct(string $Nome, string $Plataforma, string $Genero, int $ano, float $preco, bool $disponivel, Console $console, float $custoDanos) {
        $this->nome = $Nome;
        $this->plataforma = $Plataforma;
        $this->ano = $ano;
        $this->preco = $preco;
        $this->disponivel = $disponivel;
        $this->genero = $Genero;
        $this->console = $console;
        $this->custoDanos = $custoDanos;
    }

    public function Jogar() { // só mostra na tela que está jogando o jogo físico
        echo "Jogando o jogo físico: {$this->nome} na plataforma {$this->plataforma} no console {$this->console->getModelo()}";
    }

    public function Alugar(cliente $cliente, int $dias) { // Aluga o jogo físico para o cliente por um número de dias
        if ($this->disponivel && $cliente->podeAlugar) {
            $this->disponivel = false;
            $this->cliente = $cliente;
            $precoTotal = $this->preco * $dias;
            echo "Jogo físico {$this->nome} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Preço total: R$ {$precoTotal}";
        } else {
            echo "Jogo físico {$this->nome} não está disponível para aluguel.";
        }
    }

    public function getDados(): string {
        return "Nome: {$this->nome}, Plataforma: {$this->plataforma}, Gênero: {$this->genero}, Ano: {$this->ano}, Preço: R$ {$this->preco}, Disponível: " . ($this->disponivel ? 'Sim' : 'Não') . ", Console: {$this->console->getModelo()}, Custo de Danos: R$ {$this->custoDanos}";
    }
}