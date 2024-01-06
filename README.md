
# CRUD Laravel

CRUD em laravel


## Dependência

[PHP 8.2](https://www.php.net/downloads.php)
[PostgreSQL 16](https://www.postgresql.org/download/)
[Composer 2.6.5](https://getcomposer.org/download/)


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/brunojcamargo/crud-laravel
```

Entre no diretório do projeto

```bash
  cd crud-laravel
```

Crie o .env
```bash
    cp .env.example .env
```

Preencha no .env os dados de comunicação com o database.

Instale as dependências

```bash
    composer install
```

Gere o key

```bash
    php artisan key:generate
```

Execute as migrations

```bash
    php artisan migrate
```

Inicie o servidor

```bash
    php artisan serve
```

## Documentação da API

Após instalar o projeto, acesse a url informada no terminal para consultar a documentação.
