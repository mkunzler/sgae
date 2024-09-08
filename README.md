# Projeto apresentado como TCC do Curso Sistemas de Informação

## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/mkunzler/sgae.git sgae
```
```sh
cd sgae/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="SGAE"
APP_URL=http://localhost/login

DB_CONNECTION=pgsql
DB_HOST=db_sgae
DB_PORT=5432
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui


```
Acesse a pasta do docker
```sh
cd .devcontainer
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker exec -t web-sgae /bin/bash
```


Gere as migrations
```sh
php artisan migrate:refresh --seed
```

Acesse o projeto
[http://localhost/login](http://localhost/login)
