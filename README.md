# Laravel CMS

Este projeto foi desenvolvido em aula do curso de Laravel da [B7Web](https://b7web.com.br/). Este é um CMS (Sistema de Gerenciamento de Conteúdo) desenvolvido em Laravel. Ele permite que você crie e administre um site.

## Características

- Criação de usários, páginas e configurações
- Sistema de login e autenticação

## Tecnologias Utilizadas

- PHP
- Laravel
- MySQL

## Como Executar o Projeto

1. Clone o repositório:

   ```bash
   git clone https://github.com/matheus-jardim/laravel-cms.git
   ```
2. Instale as dependências:

    ```bash
    composer install
    ```

3. Crie um arquivo `.env` e configure as variáveis de ambiente:

    ```bash
    cp .env.example .env
    ```

4. Crie o banco de dados:

    ```bash
    mysql -u root -p
    ```
    ```bash
    CREATE DATABASE laravel_cms;
    ```

5. Execute as migrações:

    ```bash
    php artisan migrate
    ```
6. Inicie o servidor:

    ```bash
    php artisan serve
    ```
