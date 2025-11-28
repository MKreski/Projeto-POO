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
        return "Modelo: {$this->getModelo()}, Fabricante: {$this->getFabricante()}, Ano: {$this->getAno()}, Preço: R$ {$this->getPreco()}, Disponível: " . ($this->getDisponivel() ? 'Sim' : 'Não');
    }

    public function Alugar(Cliente $cliente, int $dias) // nessa parte só vai pegar o cliente pq da tanto pra alugar jogo como console, (até por isso q é uma função abstrata né)
    {
        if ($this->getDisponivel() && $cliente->getPodeAlugar()) {
            $this->setDisponivel(false);
            $precoTotal = $this->getPreco() * $dias;
            echo "Console {$this->getModelo()} alugado por {$dias} dias para o cliente {$cliente->getNome()}. Preço total: R$ {$precoTotal}";
        } else {
            echo "Console {$this->getModelo()} não está disponível para aluguel.";
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
        if (empty($this->getJogos())) {
            return "Nenhum jogo associado a este console.";
        }

        $listaJogos = "Jogos associados ao console {$this->modelo}:\n";
        foreach ($this->getJogos() as $jogo) {
            $listaJogos .= "- " . $jogo->getDados() . "\n";
        }
        return $listaJogos;
    }
}