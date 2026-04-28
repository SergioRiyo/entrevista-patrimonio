# Avaliação
Projeto de avaliação dos conhecimentos de desenvolvimento de uma aplicação web.
A avaliação será formada pelos seguintes pontos
- Resolução dos problemas propostos na Descrição
- Qualidade do código

## Entrega
Após finalizar, o candidato deve disponibilizar o link do repositório no github.

## Prazo
O candidato terá 3 dias corridos a partir da disponibilização deste arquivo para finalizar o projeto.

## Especificações
* Postgres 14+
* Laravel - Nesse teste é necessário implementar a Camada de Serviços (Service Layer)

## Observações
*Este projeto conta com o ambiente de banco dados já prepardo no docker.*
- Quaisquer configurações ou alterações necessárias para que o projeto seja executado,
devem ser documentadas no projeto

## Descrição do problema
Por um acordo legal prévio, os estabelecimentos conveniados de uma rede, podem fazer empréstimos de patrimônios entre si, hoje esses empréstimos são feitos em papel. 
Para cada empréstimo, é necessário preencher o documento físico com os dados do estabelecimento requerente e estabelecimento atendente, que são os mesmos: Nome, CNPJ. Além disso, os patrimônios que serão emprestados, com data de empréstimo e data de devolução de cada um.
Uma informação importante que se perde por causa do papel é que os estabelecimentos só podem emprestar para estabelecimentos do mesmo tipo, e quando é possível o empréstimo, alguns estabelecimentos tem um tempo máximo para o empréstimo, que deve ser  rigorosamente respeitado.
Quando um empréstimo é feito, é necessário ter a data de empréstimo e data de devolução e não pode permitir empréstimo de patrimônios baixados, que é recorrente no modo de empréstimo atual, já que é impossível de ter controle dos patrimônios de todos os estabelecimentos, já que cada estabelecimento gerencia de forma diferente os patrimônios.
É importante lembrar que independente do estabelecimento, os patrimônios tem informações em comum: Nome, Código, Tipo (Próprio, Alugado, Emprestado), Data de Entrada, Estabelecimento Pai e a Baixa - A baixa é quando o patrimônio não está integro para uso e o estabelecimento o desativa - Para a baixa é necessário preencher duas informações: Data e Motivo da Baixa.

## Objetivo
Tendo o exposta acima, o objetivo é desenvolver um sistema (CRUD) para gerenciamento de empréstimos dos patrimônios do estabelecimentos dessa rede. Esse sistema deve estar bem estruturado e obedecer rigorosamente as regras descritas acima.
