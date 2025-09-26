<?php
// camelCase
// PascalCase
// snake_case

namespace unimar\poogames;

use Unimar\Poogames\Produto;

abstract class Jogo Extends Produto {
    public string $nome;
    public string $plataforma;
    public string $genero;

    abstract function Jogar(); // função abstrata pq tanto o jogo físico como o digital vão implementar de formas diferentes

}