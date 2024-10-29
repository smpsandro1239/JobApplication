# JobApplication

Este repositório contém um sistema de aplicação de emprego desenvolvido em Laravel, com interface administrativa para gerenciar ofertas de emprego e acompanhar candidaturas.

## Visão Geral

O **JobApplication** é uma aplicação web para a gestão de vagas de emprego e acompanhamento de candidaturas, onde administradores podem criar e editar ofertas de trabalho, e os candidatos podem acompanhar o status de suas candidaturas.

## Funcionalidades

-   **Login de Administradores**: Autenticação para acesso seguro ao painel administrativo.
-   **Gestão de Vagas**: Admins podem criar, editar e excluir vagas de emprego.
-   **Gestão de Candidaturas**: Atualização do status das candidaturas (Aceite, Pendente ou Rejeitado).
-   **Notificações**: Notificação de sucesso e falha em operações para feedback ao usuário.
-   **Upload de Imagens**: Admins podem fazer upload de imagens para cada vaga.

## Estrutura do Projeto

### Diretórios Principais

-   `app/Http/Controllers`: Controladores da aplicação, como o `AdminController`.
-   `resources/views/admin`: Views Blade para a interface de administração.
-   `routes/web.php`: Rotas da aplicação.
-   `public/`: Arquivos estáticos e assets.

### Linguagens e Tecnologias

O projeto utiliza as seguintes tecnologias:

-   **PHP (Laravel)** - para desenvolvimento backend.
-   **Blade** - como motor de templates para views.
-   **JavaScript (jQuery)** - para interatividade frontend.
-   **HTML, CSS, SCSS** - para o layout e estilos da aplicação.

## Pré-requisitos

-   **PHP >= 7.4**
-   **Composer**
-   **Node.js e npm**
-   **Laravel**
-   **MySQL**

## Instalação

1. Clone este repositório:

    ```bash
    git clone https://github.com/smpsandro1239/JobApplication.git
    Entre no diretório do projeto:
    ```

bash
Copiar código
cd JobApplication
Instale as dependências do PHP e do Node.js:

bash
Copiar código
composer install
npm install
Crie o arquivo .env e configure o banco de dados:

bash
Copiar código
cp .env.example .env
php artisan key:generate
Configure as variáveis de ambiente no arquivo .env para o banco de dados, por exemplo:

makefile
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
Execute as migrações para criar as tabelas no banco de dados:

bash
Copiar código
php artisan migrate
Inicie o servidor local:

bash
Copiar código
php artisan serve
Acesse a aplicação em http://localhost:8000.

Contribuição
Sinta-se à vontade para contribuir com o projeto. Faça um fork do repositório, crie um branch para suas alterações, e abra um pull request para revisão.

Licença
Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais informações.
