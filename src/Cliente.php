<?php

namespace unimar\poogames;

class Cliente
{
    private string $nome;
    private string $email;
    private bool $podeAlugar;
    
    public function __construct(string $nome, string $email, bool $podeAlugar = true)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setPodeAlugar($podeAlugar);
    }

    //  SERIA A MESMA COISA DO getDados, só que separado não?

    public function getNome() : string
    {
        return $this->nome;
    }

    private function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    private function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getPodeAlugar() : bool
    {
        return $this->podeAlugar;
    }

    private function setPodeAlugar(bool $podeAlugar) : void
    {
        $this->podeAlugar = $podeAlugar;
    }

    public function getDados() : string 
    {
        return "Nome: {$this->getNome()}, Email: {$this->getEmail()}, Pode Alugar: {$this->getPodeAlugar()}" . ($this->getPodeAlugar() ? 'Sim' : 'Não');
    }
}