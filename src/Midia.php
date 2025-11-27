<?php

namespace unimar\poogames;

abstract class Midia extends Produto {
    private string $titulo;
    private string $diretor;
    private string $genero;

    protected function __construct(string $titulo, string $diretor, string $genero, int $ano, float $preco) {
        parent::__construct($ano, $preco); // Chama o construtor de Produto
        $this->setTitulo($titulo);
        $this->setDiretor($diretor);
        $this->setGenero($genero);
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getDiretor(): string {
        return $this->diretor;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    private function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    private function setDiretor(string $diretor): void {
        $this->diretor = $diretor;
    }

    private function setGenero(string $genero): void {
        $this->genero = $genero;
    }
    
    abstract public function Assistir(); 
}