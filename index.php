<?php

require_once 'vendor/autoload.php';

use Unimar\Poogames\Cliente;
use Unimar\Poogames\Console;
use Unimar\Poogames\JogoFisico;
use Unimar\Poogames\JogoDigital;
use Unimar\Poogames\Serie;
use Unimar\Poogames\Filme;

echo "Insira o nome do cliente: ";
$nome = readline();
echo "Insira o email do cliente: "; 
$email = readline();
$clienteNovo = new Cliente($nome, $email);
echo $clienteNovo->getDados();

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
$generoJogoFisico = readline("Insira o gênero do jogo físico: ");
$anoJogoFisico = (int)readline("Insira o ano do jogo físico: ");
$precoJogoFisico = (float)readline("Insira o preço do jogo físico: ");
$custoDanos = (float)readline("Insira o custo de danos do jogo físico: ");
$jogoFisico = new JogoFisico($nomeJogoFisico, $generoJogoFisico, $anoJogoFisico, $precoJogoFisico, true, $console, $custoDanos);
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

echo "\n--- Testando Série ---\n";
echo "Insira o título da série: ";
$tituloSerie = readline();
echo "Insira o diretor da série: ";
$diretorSerie = readline();
echo "Insira o gênero da série: ";
$generoSerie = readline();
echo "Insira o número de temporadas da série: ";
$temporadasSerie = (int)readline();
echo "Insira o número de episódios por temporada: ";
$episodiosSerie = (int)readline();
echo "Insira o ano da série: ";
$anoSerie = (int)readline();
echo "Insira o preço da série: ";
$precoSerie = (float)readline();
$serie = new Serie($tituloSerie, $diretorSerie, $generoSerie, $temporadasSerie, $episodiosSerie, $anoSerie, $precoSerie);
echo $serie->getDados() . "\n";

echo "\nAlugando a série...\n";
$diasAluguelSerie = (int)readline("Insira o tempo de aluguel em dias: ");
$serie->Alugar($clienteNovo, $diasAluguelSerie);

echo "\n--- Testando Filme ---\n";
echo "Insira o título do filme: "; 
$tituloFilme = readline();
echo "Insira o diretor do filme: ";
$diretorFilme = readline();
echo "Insira o gênero do filme: ";
$generoFilme = readline();
echo "Insira a duração do filme em minutos: ";
$duracaoFilme = (int)readline();
echo "Insira o ano do filme: ";
$anoFilme = (int)readline();
echo "Insira o preço do filme: ";
$precoFilme = (float)readline();
$filme = new Filme($tituloFilme, $diretorFilme, $generoFilme, $duracaoFilme, $anoFilme, $precoFilme);
echo $filme->getDados() . "\n";

echo "\nAlugando o filme...\n";
$diasAluguelFilme = (int)readline("Insira o tempo de aluguel em dias: ");
$filme->Alugar($clienteNovo, $diasAluguelFilme);

echo "\nAssistindo ao filme e à série...\n";
$filme->Assistir();
echo "\n";
$serie->Assistir();
echo "\n";

echo "\nFim dos testes.\n";
$console = null;
$jogoDigital = null;
$jogoFisico = null;
$serie = null;
$filme = null;
$clienteNovo = null;
