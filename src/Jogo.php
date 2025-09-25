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

    abstract function Jogar();

}