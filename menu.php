<?php

require_once 'vendor/autoload.php';

use Unimar\Poogames\Cliente;
use Unimar\Poogames\Console;
use Unimar\Poogames\JogoFisico;
use Unimar\Poogames\JogoDigital;
use Unimar\Poogames\Serie;
use Unimar\Poogames\Filme;

// Variáveis de estado
$clienteAtual = null;
$consoleAtual = null;
$jogoDigitalAtual = null;
$jogoFisicoAtual = null; // Apenas para referência do último criado
$filmeAtual = null;
$serieAtual = null;

$opcao = -1;

while ($opcao != 0) {
    echo "\n--- MENU PRINCIPAL ---\n";
    echo "1. Cadastrar Cliente\n";
    echo "2. Gerenciar Console\n";
    echo "3. Gerenciar Jogo Digital\n";
    echo "4. Gerenciar Jogo Físico\n";
    echo "5. Gerenciar Filme\n";
    echo "6. Gerenciar Série\n";
    echo "7. Editar Preço\n";
    echo "8. Mostrar Tudo\n";
    echo "0. Sair\n";
    
    $opcao = (int)readline("Escolha uma opção: ");

    switch ($opcao) {
        case 1: // CLIENTE
            echo "\n--- Novo Cliente ---\n";
            $nome = readline("Nome: ");
            $email = readline("Email: ");
            $clienteAtual = new Cliente($nome, $email);
            echo "Cliente cadastrado!\n";
            break;

        case 2: // CONSOLE
            if (!$clienteAtual) { echo "\nERRO: Cadastre um cliente primeiro!\n"; break; }
            
            echo "\n--- Novo Console ---\n";
            $modelo = readline("Modelo: ");
            $fab = readline("Fabricante: ");
            $ano = (int)readline("Ano: ");
            $preco = (float)readline("Preço Aluguel: ");
            
            $consoleAtual = new Console($modelo, $fab, $ano, $preco);
            echo "Console criado.\n";
            
            $dias = (int)readline("Deseja alugar por quantos dias? (0 para não): ");
            if ($dias > 0) $consoleAtual->Alugar($clienteAtual, $dias);
            break;

        case 3: // JOGO DIGITAL
            if (!$clienteAtual) { echo "\nERRO: Cadastre um cliente primeiro!\n"; break; }

            echo "\n--- Novo Jogo Digital ---\n";
            $nome = readline("Nome: ");
            $plat = readline("Plataforma: ");
            $gen = readline("Gênero: ");
            $ano = (int)readline("Ano: ");
            $preco = (float)readline("Preço: ");

            $jogoDigitalAtual = new JogoDigital($nome, $plat, $gen, $ano, $preco);
            
            $dias = (int)readline("Dias para alugar (0 para não): ");
            if ($dias > 0) $jogoDigitalAtual->Alugar($clienteAtual, $dias);
            
            echo "\n";
            $jogoDigitalAtual->Jogar();
            break;

        case 4: // JOGO FÍSICO
            if (!$clienteAtual) { echo "\nERRO: Cadastre um cliente primeiro!\n"; break; }
            if (!$consoleAtual) { echo "\nERRO: Você precisa de um Console cadastrado!\n"; break; }

            echo "\n--- Novo Jogo Físico ---\n";
            $nome = readline("Nome: ");
            $gen = readline("Gênero: ");
            $ano = (int)readline("Ano: ");
            $preco = (float)readline("Preço: ");
            $dano = (float)readline("Custo Danos: ");

            $jogoFisicoAtual = new JogoFisico($nome, $gen, $ano, $preco, true, $consoleAtual, $dano);

            $dias = (int)readline("Dias para alugar (0 para não): ");
            if ($dias > 0) {
                $jogoFisicoAtual->Alugar($clienteAtual, $dias);
                $consoleAtual->adicionarJogo($jogoFisicoAtual);
            }
            echo "\n";
            $jogoFisicoAtual->Jogar();
            break;

        case 5: // FILME
            if (!$clienteAtual) { echo "\nERRO: Cadastre um cliente primeiro!\n"; break; }

            echo "\n--- Novo Filme ---\n";
            $tit = readline("Título: ");
            $dir = readline("Diretor: ");
            $gen = readline("Gênero: ");
            $dur = (int)readline("Duração (min): ");
            $ano = (int)readline("Ano: ");
            $preco = (float)readline("Preço: ");

            $filmeAtual = new Filme($tit, $dir, $gen, $dur, $ano, $preco);

            $dias = (int)readline("Dias para alugar (0 para não): ");
            if ($dias > 0) $filmeAtual->Alugar($clienteAtual, $dias);
            
            echo "\n";
            $filmeAtual->Assistir();
            break;

        case 6: // SÉRIE
            if (!$clienteAtual) { echo "\nERRO: Cadastre um cliente primeiro!\n"; break; }

            echo "\n--- Nova Série ---\n";
            $tit = readline("Título: ");
            $dir = readline("Diretor: ");
            $gen = readline("Gênero: ");
            $temps = (int)readline("Num Temporadas: ");
            $eps = (int)readline("Eps por Temporada: ");
            $ano = (int)readline("Ano: ");
            $preco = (float)readline("Preço: ");

            $serieAtual = new Serie($tit, $dir, $gen, $temps, $eps, $ano, $preco);

            $dias = (int)readline("Dias para alugar (0 para não): ");
            if ($dias > 0) $serieAtual->Alugar($clienteAtual, $dias);
            
            echo "\n";
            $serieAtual->Assistir();
            break;

        case 7: // EDITAR PREÇO
            echo "\n--- Editar Preço ---\n";
            echo "1. Console / 2. Jogo Digital / 3. Jogo Físico / 4. Filme / 5. Série\n";
            $escolhaItem = (int)readline("Item: ");
            
            $obj = null;
            if ($escolhaItem == 1) $obj = $consoleAtual;
            elseif ($escolhaItem == 2) $obj = $jogoDigitalAtual;
            elseif ($escolhaItem == 3) $obj = $jogoFisicoAtual;
            elseif ($escolhaItem == 4) $obj = $filmeAtual;
            elseif ($escolhaItem == 5) $obj = $serieAtual;

            if ($obj != null) {
                echo "Atual: R$ " . $obj->getPreco() . "\n";
                $novo = (float)readline("Novo preço: ");
                $obj->atualizarPreco($novo); 
            } else {
                echo "Item não existe.\n";
            }
            break;

        case 8: // MOSTRAR TUDO
            echo "\n==============================\n";
            echo "      RELATÓRIO GERAL       ";
            echo "\n==============================\n";

            // CLIENTE
            echo "\n[CLIENTE]\n";
            if ($clienteAtual) {
                echo $clienteAtual->getDados() . "\n";
            } else {
                echo "- Nenhum cliente cadastrado.\n";
            }

            // CONSOLE (e seus jogos)
            echo "\n[CONSOLE ATUAL]\n";
            if ($consoleAtual) {
                echo $consoleAtual->getDados() . "\n";
                // Usa a função listarJogos da classe Console
                echo $consoleAtual->listarJogos(); 
            } else {
                echo "- Nenhum console cadastrado.\n";
            }

            // JOGO DIGITAL
            echo "\n[JOGO DIGITAL ATUAL]\n";
            if ($jogoDigitalAtual) {
                echo $jogoDigitalAtual->getDados() . "\n";
            } else {
                echo "- Nenhum jogo digital selecionado.\n";
            }

            // FILME
            echo "\n[FILME ATUAL]\n";
            if ($filmeAtual) {
                echo $filmeAtual->getDados() . "\n";
            } else {
                echo "- Nenhum filme selecionado.\n";
            }

            // SÉRIE
            echo "\n[SÉRIE ATUAL]\n";
            if ($serieAtual) {
                echo $serieAtual->getDados() . "\n";
            } else {
                echo "- Nenhuma série selecionada.\n";
            }
            echo "\n==============================\n";
            break;

        case 0:
            echo "Saindo...\n";
            break;

        default:
            echo "Opção inválida!\n";
            break;
    }
}