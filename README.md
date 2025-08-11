# Projeto Pedidos - Laravel API

API REST para gerenciamento de pedidos, construída com Laravel 12.

---

## Requisitos

- PHP 8.1 ou superior  
- Composer  
- MySQL (ou outro banco compatível)  
- Git  
- Postman (para testar API)

---

## Configuração Inicial

### 1. Criar banco de dados

Crie um banco vazio no MySQL (ou outro SGBD), por exemplo:

```sql
CREATE DATABASE pedidos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
### 2. Configurar .env

Copie o arquivo de exemplo e configure as variáveis de ambiente:

```bash
cp .env.example .env
```

Edite .env e ajuste a conexão com o banco:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pedidos_db
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 3. Instalar dependências e gerar chave

```bash
composer install
php artisan key:generate
```

### 4. Rodar migrations

```bash
php artisan migrate
```

### 5. Limpar caches

```bash
php artisan config:clear
php artisan cache:clear
```

### 6. Rodar servidor

```bash
php artisan serve
```

## Testando a API

Acesse o Postman ou similar e use a URL base:

```arduino
http://localhost:8000/api
```

### Endpoints

| Método | Rota            | Descrição                 |
| ------ | --------------- | ------------------------- |
| GET    | `/teste`        | Testa se a API está ativa |
| GET    | `/pedidos`      | Lista todos os pedidos    |
| POST   | `/pedidos`      | Cria novo pedido          |
| GET    | `/pedidos/{id}` | Detalha pedido por ID     |
| PUT    | `/pedidos/{id}` | Atualiza pedido           |
| DELETE | `/pedidos/{id}` | Deleta pedido             |



### Modelo JSON para criar/atualizar pedido

```json
{
  "nome_cliente": "João Silva",
  "data_pedido": "2025-08-11",
  "data_entrega": "2025-08-15",
  "status": "pendente"
}
```

