<?php

namespace unimar\poogames;

use Unimar\Poogames\Jogo;
use Unimar\Poogames\Cliente;

class JogoDigital extends Jogo {
    protected string $chaveTemp = ""; // chave de acesso temporária
    protected int $copias; // número de cópias que seram alugadas na mesma chave

    public function __construct(string $Nome, string $Plataforma, string $Genero, int $ano, float $preco, bool $disponivel = true) {
        $this->nome = $Nome;
        $this->plataforma = $Plataforma;
        $this->genero = $Genero;
        $this->ano = $ano;
        $this->preco = $preco;
        $this->disponivel = $disponivel;
    }

    protected function gerarChaveTemp(): string { //essa função gera uma chave temporária para o jogo digital
        $chave = "Ch4ve_d3_ace55o_do_" . $this->nome . "_p4ra_" . $this->plataforma;
        return $chave;
    }

    public function Jogar() {
        echo "Jogando o jogo digital: {$this->nome} na plataforma {$this->plataforma} com a chave temporária: {$this->chaveTemp}";
    }

    public function Alugar(cliente $cliente, int $dias) {
        if ($this->disponivel && $cliente->podeAlugar) {
            $this->disponivel = false;
            $this->cliente = $cliente;
            $this->chaveTemp = $this->gerarChaveTemp();
            $preco = $this->preco * $dias;
            echo "Jogo digital {$this->nome} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Chave temporária: {$this->chaveTemp} Preço total: R$ {$preco}";
        } else {
            echo "Jogo digital {$this->nome} não está disponível para aluguel.";
        }
    }

    public function getDados(): string {
        return "Nome: {$this->nome}, Plataforma: {$this->plataforma}, Gênero: {$this->genero}, Ano: {$this->ano}, Preço: R$ {$this->preco}, Disponível: " . ($this->disponivel ? 'Sim' : 'Não') . ", Chave Temporária: {$this->chaveTemp}";
    }   
}   