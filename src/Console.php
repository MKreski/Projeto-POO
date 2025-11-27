<?php

namespace unimar\poogames;

use Unimar\Poogames\Produto;

class Console extends Produto
{
    private string $modelo;
    private string $fabricante;
    private array $jogos = [];

    public function __construct(string $modelo, string $fabricante, int $ano, float $preco, bool $disponivel = true)
    {
        parent::__construct($ano, $preco, $disponivel);
        $this->setModelo($modelo);    
        $this->setFabricante($fabricante);   
    }

    public function getModelo() :  string
    {
        return $this->modelo;
    }

    private function setModelo(string $modelo) : void
    {
        $this->modelo = $modelo;
    }

    public function getFabricante() : string
    {
        return $this->fabricante;
    }

    private function setFabricante(string $fabricante) : void
    {
        $this->fabricante = $fabricante;
    }

    public function getJogos() : array
    {
        return $this->Jogos;
    }

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

    public function removerJogo(JogoFisico $jogo) // Remove um jogo físico do array do console
    {
        $index = array_search($jogo, $this->jogos);
        if ($index !== false) {
            unset($this->jogos[$index]);
            $this->jogos = array_values($this->jogos); // Reindexa o array após a remoção
        }
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