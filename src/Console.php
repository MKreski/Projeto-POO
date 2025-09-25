<?php

namespace unimar\poogames;

use Unimar\Poogames\Produto;

class Console
{
    public string $modelo;
    protected string $fabricante;

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
}