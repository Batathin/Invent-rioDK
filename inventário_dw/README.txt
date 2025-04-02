README - Sistema de Inventário de Jogo

O que é um inventário de jogo?
Um inventário de jogo é um sistema que gerencia os itens que um jogador pode coletar, armazenar e utilizar dentro de um jogo. Ele pode incluir armas, armaduras, recursos consumíveis e outros objetos essenciais para a progressão do jogador.

Quais sistemas utilizam essa funcionalidade?
Sistemas que utilizam um inventário incluem:
- Jogos RPG (exemplo: The Witcher, Skyrim)
- Jogos de sobrevivência (exemplo: Minecraft, Rust)
- Jogos de tiro (exemplo: Call of Duty, Counter-Strike)
- Jogos de mundo aberto (exemplo: GTA, Red Dead Redemption)

Por que essa funcionalidade é importante?
O inventário é essencial para a jogabilidade, permitindo que os jogadores:
- Gerenciem recursos e equipamentos
- Melhorem a estratégia ao longo do jogo
- Armazem itens para uso posterior
- Possam vender ou trocar objetos

Implementação

Front-End
- Ferramentas/Frameworks utilizados:
  - HTML, CSS e JavaScript: Para estruturação e interatividade da interface.
  - Bootstrap: Para um design responsivo e organizado.
  - jQuery: Para manipulação do DOM e requisições dinâmicas.

- Como o layout foi feito?
  - O layout do inventário segue uma estrutura baseada em linhas e colunas, onde cada linha representa uma fileira de itens e cada coluna armazena um item específico.

Back-End
- Ferramentas/Linguagens/Frameworks utilizados:
  - PHP: Para a lógica do servidor.
  - MySQL: Para armazenamento dos dados dos itens.
  - Apache: Para hospedar e servir os arquivos do sistema.

Código PHP

O que o código PHP faz?
Os principais arquivos PHP e suas funções são:
- add_item.php: Adiciona um novo item ao inventário.
- create.php: Cria tabelas ou registros no banco de dados.
- get_item_stats.php: Recupera estatísticas ou detalhes sobre um item.
- index.php: Página principal do sistema.
- paginainicial.php: Interface inicial do inventário.

Passo a passo para executar o sistema
1. Instalar um servidor local (XAMPP, WAMP, ou equivalente).
2. Copiar os arquivos do projeto para a pasta htdocs (XAMPP) ou www (WAMP).
3. Importar o banco de dados inventário_dw.sql para o MySQL.
4. Iniciar o servidor Apache e MySQL.
5. Acessar http://localhost/Inventario-master/index.php pelo navegador.

Hierarquia de diretórios do projeto
Inventario-master/
|-- add_item.php
|-- create.php
|-- get_item_stats.php
|-- index.php
|-- paginainicial.php
|-- inventário_dw.sql

Repositório no GitHub
[Repositório do Projeto](#) (substituir com o link real do GitHub quando disponível)
