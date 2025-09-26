<?php

namespace unimar\poogames;

use Unimar\Poogames\Produto;

class Console
{
    public string $modelo;
    protected string $fabricante;
    public array $jogos = [];

    public function __construct(string $modelo, string $fabricante, int $ano, float $preco, bool $disponivel = true)
    {
        $this->modelo = $modelo;     
        $this->fabricante = $fabricante;     
        $this->ano = $ano;
        $this->preco = $preco;
        $this->disponivel = $disponivel;
    }

    public function getModelo() :  string
    {
        return $this->modelo;
    }

    public function getFabricante() : string
    {
        return $this->fabricante;
    }

    // public function getJogos() : string
    // {
    //     return $this->Jogos;
    // }

    public function getDados() : string
    {
        return "Modelo: {$this->modelo}, Fabricante: {$this->fabricante}, Ano: {$this->ano}, Preço: R$ {$this->preco}, Disponível: " . ($this->disponivel ? 'Sim' : 'Não');
    }

    public function Alugar(Cliente $cliente, int $dias) // nessa parte só vai pegar o cliente pq da tanto pra alugar jogo como console, (até por isso q é uma função abstrata né)
    {
        if ($this->disponivel && $cliente->podeAlugar) {
            $this->disponivel = false;
            $this->cliente = $cliente;
            $precoTotal = $this->preco * $dias;
            echo "Console {$this->modelo} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Preço total: R$ {$precoTotal}";
        } else {
            echo "Console {$this->modelo} não está disponível para aluguel.";
        }
    }

    public function adicionarJogo(JogoFisico $jogo) // Adiciona um jogo físico ao array do console
    {
        array_push($this->jogos, $jogo);
    }

    public function listarJogos(): string // Lista os jogos associados ao console
    {
        if (empty($this->jogos)) {
            return "Nenhum jogo associado a este console.";
        }

        $listaJogos = "Jogos associados ao console {$this->modelo}:\n";
        foreach ($this->jogos as $jogo) {
            $listaJogos .= "- " . $jogo->getDados() . "\n";
        }
        return $listaJogos;
    }
}