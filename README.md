<h1>College System</h1>

## Iniciando Projeto

Para iniciar o servidor, abra o terminal e navegue até a pasta em que se encontra o projeto. Logo após execute "php artisan serve".


## Inserindo registros no Banco de Dados

Abra um novo terminal e seguindo o mesmo caminho informado anteriormente, execute "php artisan migrate". Logo após execute "composer dump-autoload" para baixar as depêndecias para os seeds. Depois de terminado execute "php artisan db:seed", esse comando vai inserir alguns registros nas tabelas que serão utilizadas.

## Testando API

Para fazer o teste das API's, pegue a url que o comando "php artisan serve" gerou e coloque nas requisições utilizando o Postman ou então o Insomnia.
