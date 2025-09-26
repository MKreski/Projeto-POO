<?php

require_once 'vendor/autoload.php';

use Unimar\Poogames\Cliente;
use Unimar\Poogames\Console;
use Unimar\Poogames\JogoFisico;
use Unimar\Poogames\JogoDigital;

// $consoleTeste = new Console("Xbox", "Microsoft", 2020, 150);

echo "Insira o nome do cliente: ";
$nome = readline();
echo "Insira o email do cliente: "; 
$email = readline();
$clienteNovo = new Cliente($nome, $email);
echo $clienteNovo->getDados();

// echo "\n\n--- Testando Jogo Físico ---\n";
// $ps5 = new Console("PlayStation 5", "Sony", 2020);
// $jogoFisico = new JogoFisico("The Last of Us Part II", "PS Store", "Ação/Aventura", 2020, 29.99, true, $ps5, 15.00);
// echo $jogoFisico->getDados() . "\n";

echo "\n\n--- Adicionando Jogo Digital ---\n";
echo "Insira o nome do jogo digital: ";
$nomeJogo = readline();
echo "Insira a plataforma do jogo digital: ";
$plataformaJogo = readline();
echo "Insira o gênero do jogo digital: ";
$generoJogo = readline();
echo "Insira o ano do jogo digital: ";
$anoJogo = (int)readline();
echo "Insira o preço do jogo digital: ";
$precoJogo = (float)readline();
$jogoDigital = new JogoDigital($nomeJogo, $plataformaJogo, $generoJogo, $anoJogo, $precoJogo);
echo $jogoDigital->getDados() . "\n";

echo "\nAlugando o jogo digital...\n";
echo "Insira o tempo de aluguel em dias: ";
$diasAluguel = (int)readline();
$jogoDigital->Alugar($clienteNovo, $diasAluguel);

echo "\nAdicionando Console...\n";
$modelonsole = readline("Insira o modelo do console: ");
$fabricanteConsole = readline("Insira a fabricante do console: ");
$anoConsole = (int)readline("Insira o ano do console: ");
$precoConsole = (float)readline("Insira o preço para alugar do console: ");
$console = new Console($modelonsole, $fabricanteConsole, $anoConsole, $precoConsole);
echo $console->getDados() . "\n";

echo "\nAlugando o console...\n";
$diasAluguelConsole = (int)readline("Insira o tempo de aluguel em dias: ");
$console->Alugar($clienteNovo, $diasAluguelConsole);

echo "\nAdicionando Jogo Físico...\n";
$nomeJogoFisico = readline("Insira o nome do jogo físico: ");
$plataformaJogoFisico = readline("Insira a plataforma do jogo físico: ");
$generoJogoFisico = readline("Insira o gênero do jogo físico: ");
$anoJogoFisico = (int)readline("Insira o ano do jogo físico: ");
$precoJogoFisico = (float)readline("Insira o preço do jogo físico: ");
$custoDanos = (float)readline("Insira o custo de danos do jogo físico: ");
$jogoFisico = new JogoFisico($nomeJogoFisico, $plataformaJogoFisico, $generoJogoFisico, $anoJogoFisico, $precoJogoFisico, true, $console, $custoDanos);
echo $jogoFisico->getDados() . "\n";

echo "\nAlugando o jogo físico...\n";
$diasAluguelFisico = (int)readline("Insira o tempo de aluguel em dias: ");
$jogoFisico->Alugar($clienteNovo, $diasAluguelFisico);
$console->adicionarJogo($jogoFisico);

echo "\n Jogar os jogos...\n";
$jogoDigital->Jogar();
echo "\n";
$jogoFisico->Jogar();
echo "\n";