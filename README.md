Matheus Vinicius Rodrigues Kreski - 2038100  
Vitor Mapelli Antunes - 2042541
Iago Gabriel Firmino Silva - 2030563

Certifique-se que o PHP e o COMPOSER estejam devidamente instalados (Veja mais em https://getcomposer.org e https://www.php.net)
Apenas baixar, abrir o terminal e digitar "php index.php" ou "php menu.php";

Esse projeto simula uma loja/locadora de jogos com foco em abstração, herança encapsulamento e polimorfismo. A classe Produto funciona como base abstrata com atributos comuns (como nome e preço), e a partir dela são derivados os outros elementos: a classe Jogo, que se subdivide em JogoFisico e JogoDigital, representando as duas formas de distribuição, e a classe Console, que trata dos videogames da loja. Já a classe Cliente representa quem consome esses produtos, podendo alugá-los. Assim, o sistema organiza o domínio em uma hierarquia simples onde Produto é a abstração central e as demais classes especializam seu comportamento, mostrando na prática como a herança pode ser usada para estruturar soluções claras e reaproveitáveis.
Além de modificar o código antigo para encaixar os novos fundamentos base da programação orientada a objetos, incrementamos o projeto com as devidas indicações do enunciado. A classe Midia é uma extensão de produto e possui os atributos base: Titulo, diretor e gênero. Essa clase é herdada por Filme e Série. Filme possui um novo atributo de duração. Enquanto série possui Temporadas e Episodios por temporada. Ambas as classes novas possuem as funções bases das classes superiores e suas funcionalidades.
Foi implementado um menu para facilitar a navegação.