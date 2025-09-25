<?php

namespace unimar\poogames;

class Cliente
{
    protected string $nome;
    protected string $email;
    public bool $podeAlugar;
    
    public function __construct(string $nome, string $email, bool $podeAlugar = true)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->podeAlugar = $podeAlugar;
    }

    //  SERIA A MESMA COISA DO getDados, só que separado não?

    public function getNome() : string
    {
        return $this->nome;
    }

    // public function getEmail() : string
    // {
    //     return $this->email;
    // }

    // public function podeAlugar() : bool
    // {
    //     return $this->podeAlugar;
    // }

    public function getDados() : string 
    {
        return "Nome: {$this->nome}, Email: {$this->email}, Pode Alugar: {$this->podeAlugar}" . ($this->podeAlugar ? 'Sim' : 'Não');
    }
}