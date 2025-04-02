README - Sistema de Inventário de Dark Souls

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


  ![image](https://github.com/user-attachments/assets/7eceb6a3-0820-4d3a-88df-1763a65f0c68)

  ![image](https://github.com/user-attachments/assets/798edc4b-9224-499d-9566-7bbc180be47c)

  ![image](https://github.com/user-attachments/assets/34f8ef40-4040-473e-a404-053ee3bf310f)


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
- ![image](https://github.com/user-attachments/assets/e68d880f-4eda-4cbe-99dc-6f5186eb0d8f)

- create.php: Registra o usuário no banco de dados.
- ![image](https://github.com/user-attachments/assets/82b607a4-15f7-4299-b147-9dc651dd07be)

- get_item_stats.php: Recupera estatísticas ou detalhes sobre um item.
- ![image](https://github.com/user-attachments/assets/49909456-9586-41cc-bd1a-fc49659c741a)

  
- index.php: Página de login do sistema.

  ![image](https://github.com/user-attachments/assets/23f2779e-0a81-42e6-b347-f424f573f5b9)

- paginainicial.php: Interface inicial do inventário.

 ![image](https://github.com/user-attachments/assets/75f6e915-1a2b-4667-8b13-07312043b9ed)
 ![image](https://github.com/user-attachments/assets/fb71527c-2cc3-4b3e-a369-f673f5989780)


Passo a passo para executar o sistema
1. Instalar um servidor local (XAMPP).
2. Copiar os arquivos do projeto para a pasta htdocs (XAMPP).
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
https://github.com/Batathin/Invent-rioDK.git
