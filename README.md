## Introdução

API Tarefas

Laravel Framework 10.20.0

### requires
php 8.1

nodejs v18.17.1

### Criação banco de dados
`api_tarefa`

### Instalação de dependências
```sh
composer install
```

### Arquivo de configuração
Crie o arquivo `.env` e configure a conexão com o banco

#### Generate keys

`APP_KEY` `PUSHER_APP_ID` `PUSHER_APP_KEY` `PUSHER_APP_SECRET`

```sh
php artisan keys:generate
```

### Crie o link simbólico para o disco público

```sh
php artisan storage:link
```

### Crie tabelas
```sh
php artisan migrate --seed
```

### Documentação

```sh
php artisan l5-swagger:generate

/api/documentation
```

### License
Proprietary Software
