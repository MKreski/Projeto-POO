<?php

namespace unimar\poogames;

use Unimar\Poogames\Jogo;
use Unimar\Poogames\Cliente;

class JogoDigital extends Jogo {
    private string $chaveTemp = ""; // chave de acesso temporária
    private int $copias; // número de cópias que seram alugadas na mesma chave
    private string $plataforma; // plataforma onde o jogo digital será jogado

    public function __construct(string $Nome, string $Plataforma, string $Genero, int $ano, float $preco, bool $disponivel = true) {
        parent::__construct($Nome, $Genero, $ano, $preco, $disponivel);
        $this->setPlataforma($Plataforma);
    }

    private function gerarChaveTemp(): string { //essa função gera uma chave temporária para o jogo digital
        $chave = "Ch4ve_d3_ace55o_do_" . $this->getNome() . "_p4ra_" . $this->getPlataforma();
        return $chave;
    }

    private function setChave(): void {
        $this->chaveTemp = $this->gerarChaveTemp();
    }

    public function getChaveTemp(): string {
        return $this->chaveTemp;
    }

    public function setPlataforma(string $plataforma): void {
        $this->plataforma = $plataforma;
    }

    public function getPlataforma(): string {
        return $this->plataforma;
    }

    public function Jogar() { // só mostra na tela que está jogando o jogo digital
        echo "Jogando o jogo digital: {$this->nome} na plataforma {$this->plataforma} com a chave temporária: {$this->chaveTemp}";
    }

    public function Alugar(cliente $cliente, int $dias) { // Aluga o jogo digital para o cliente por um número de dias
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $this->setChave();
            $precoTotal = $this->preco * $dias;
            echo "Jogo digital {$this->nome} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Chave temporária: {$this->chaveTemp} Preço total: R$ {$precoTotal}";
        } else {
            echo "Jogo digital {$this->nome} não está disponível para aluguel ou o Cliente nao pode alugar.";
        }
    }

    public function getDados(): string {
        return "Nome: {$this->nome}, Plataforma: {$this->plataforma}, Gênero: {$this->genero}, Ano: {$this->ano}, Preço: R$ {$this->preco}, Disponível: " . ($this->disponivel ? 'Sim' : 'Não') . ", Chave Temporária: {$this->chaveTemp}";
    }   
}   