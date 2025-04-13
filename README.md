# Task Manager - Projeto laravel para gerenciamento de tarefas

Este é um sistema básico de gerenciamento de tarefas desenvolvido em Laravel. O projeto foi criado como um teste de habilidades para um estagio.

## Funcionalidades
- **Criar tarefas**: Permite criar uma nova tarefa com título, descrição, status e data de vencimento.
- **Listar tarefas**: Retorna todas as tarefas registradas.
- **Editar tarefas**: Apenas tarefas pendentes podem ser editadas.
- **Excluir tarefas**: Apenas tarefas pendentes podem ser deletadas.
- **Alterar status**: Tarefas podem ser marcadas como "em andamento" ou "concluído".
- **Validação de dados**: Validações para garantir consistência nos dados.

## Como rodar o projeto

### Pré-requisitos
Certifique-se de ter os seguintes itens instalados:
- **PHP** (8.x ou superior)
- **Composer** (gerenciador de dependências PHP)
- **Banco de dados** MySQL

### Passo a passo para rodar
1. **Clone o repositório**
2. **Abra o no terminal e baixe as dependências**
   - Baixe as dependências usando: ```composer install```
3. **Abrir em um editor de código**
    - Abra-o em um editor de código e configure o arquivo ```.env``` da forma que preferir, mas tenha certeza que o banco de dados escolhido é ```MySQL```
4. **Chave do projeto**
   - Crie a chave do projeto escrevendo no terminal: ```php artisan key:generate```
5. **Crie o banco de dados**
   - Escreve no terminal: ```php artisan migrate```
   - E depois: ```php artisan db:seed```
6. **Iniciar o servidor**
   - Por último, para iniciar o servidor, digite: ```php artisan serve```

## Escolhas
1. **Modelo Task**: Estrutura com campos essenciais (title, status, due_date), garantindo funcionalidade baseada nas regras de negócio.

2. **Regras de Negócio**: Apenas tarefas pendentes podem ser editadas ou deletadas..

3. **Estrutura do Banco de Dados**: Uso de migrations e seeds para a criar e popular o banco com tarefas comuns.

4. **Controlador**: Métodos organizados (index, store, update, destroy) para gerenciar o CRUD de forma eficiente.

5. **API Resource**: Usado para padronizar e transformar os dados retornados, garantindo consistência.

6. **Seeds**: Tarefas comuns foram escolhidas para popular o banco, como "Fazer compras" e "Pagar contas."

7. **Configuração de Ambiente**: Laravel configurado com MySQL.

## Respostas das perguntas:

1. **Service Providers**: Registram serviços e inicializam funcionalidades no Laravel.

2. **hasOne e hasMany**: hasOne é um relacionamento um-para-um, enquanto hasMany é um-para-muitos.

3. **Dependency Injection**: Fornece dependências automaticamente em métodos ou classes, melhorando o processo de produção.

4. **Middleware**: Filtram ou modificam requisições antes de alcançar o controlador (Ex: autenticação).

5. **Migrations**: Gerenciam estrutura do banco; facilitam versionamento e alterações.

6. **Queue**: Processa tarefas demoradas de forma assíncrona (ex.: envio de e-mails).

7. **API Resource e Controller**: Resources formatam dados; Controllers gerenciam lógica e fluxo.

