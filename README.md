# LogComex
Teste técnico para a empresa LogComex.

## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/Gabrielschmidt/LogComex.git logComex_test
```

```sh
cd logComex_test/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container
```sh
docker-compose exec app bash
```

Instale as dependências do projeto (rodara automático ao subir, mas caso necessário, rode novamente)
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Crie as tabelas no banco de dados
```sh
php artisan migrate
```

Popule a tabela Pokemon criada anteriormente rodando o command: 
```sh
php artisan app:get-pokemon
```

## Passo a passo para usar a API

Este projeto se trata de um teste, não é necessário qualquer tipo de login ou autenticação de usuário!

listar pokemons por paginação:
```sh
    list:
        GET http://localhost:8000/api/pokemon?page=1&per_page=10
```

## Considerações técnicas sobre o projeto
1- Para o command de consumir os dados dos Pokemons, poderia ter incluído validações diversas e logs de erro.

2- Poderia ter transferido o método de criar os pokemons para a service, faltou refatorar!

2- Mensagens de erro: Poderia ser criado exceptions personalizadas para tratamento de erros!

3-conversão de campos: para a conversão de altura e peso, poderia te usado o cast do láravel, faltou refatorar!

4- Interface: não implementei interfaces por se tratar de uma única entidade, caso houvessem outras e também caso houvesse necessidade de abstrações, teria injetado uma interface de service para manter a consistencia dos métodos.

6-Testes: infelizmente não consegui realizar os testes de unidade por falta de tempo, mas costumo utilizar nos projetos PHPUnit!