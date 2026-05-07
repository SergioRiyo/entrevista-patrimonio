# Sistema de Empréstimos de Patrimônios

Sistema desenvolvido em Laravel para gerenciamento de empréstimos de patrimônios entre estabelecimentos.

## Arquitetura

O projeto utiliza uma arquitetura em camadas:

Controller → Service → Repository → Model → Banco

- Controllers: recebem a requisição e retornam respostas.
- Form Requests: validam os dados de entrada.
- Services: concentram as regras de negócio.
- Repositories: centralizam o acesso ao banco.
- Models: representam as entidades do domínio.

## Configurações importantes
## As configurações abaixo foram ajustadas para simplificar a execução local
```env
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync