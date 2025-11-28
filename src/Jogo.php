<?php
// camelCase
// PascalCase
// snake_case

namespace unimar\poogames;

use Unimar\Poogames\Produto;

abstract class Jogo Extends Produto {
    private string $nome;
    private string $genero;

    protected function __construct(string $Nome, string $Genero, int $ano, float $preco, bool $disponivel = true) {
        parent::__construct($ano, $preco, $disponivel);
        $this->setNome($Nome);
        $this->setGenero($Genero);
    }

    public function getNome(): string {
        return $this->nome;
    }

    private function setNome(string $Nome): void {
        $this->nome = $Nome;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    private function setGenero(string $Genero): void {
        $this->genero = $Genero;
    }

    protected abstract function Jogar(); // função abstrata pq tanto o jogo físico como o digital vão implementar de formas diferentes

}