# Projeto Pedidos - Laravel API

API REST para gerenciamento de pedidos, feita em Laravel 12.

---

## Requisitos

- PHP 8.1+
- Composer
- MySQL (ou outro banco relacional)
- Git

---

## Configuração Inicial

Após clonar o projeto, siga os passos abaixo para preparar o ambiente:

```bash
# Copiar arquivo de ambiente
cp .env.example .env

# Instalar dependências
composer install

# Gerar a chave da aplicação Laravel
php artisan key:generate

# Rodar migrations para criar as tabelas no banco
php artisan migrate

# Limpar caches (configurações e rotas)
php artisan config:clear
php artisan cache:clear

# Rodar o servidor local
php artisan serve