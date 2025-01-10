

# Gerenciador de Projetos Laravel 🚀

Este projeto é um sistema de gerenciamento de projetos e tarefas, desenvolvido com o framework PHP **Laravel** em um grupo de alunos para
um trabalho no técnico.
Ele inclui funcionalidades para autenticação de usuários, gerenciamento de projetos e tarefas associadas, utilizando uma API RESTful.

## 🌟 Funcionalidades

- **Autenticação de Usuários**:
  - Registro de usuários.
  - Login e logout utilizando Laravel Sanctum.
- **Gerenciamento de Projetos**:
  - CRUD completo (Criar, Ler, Atualizar e Deletar) para projetos.
  - Cada projeto pode ter múltiplas tarefas associadas.
- **Gerenciamento de Tarefas**:
  - CRUD parcial (Criar, Atualizar e Deletar) para tarefas associadas a projetos.

## 🏗️ Estrutura do Projeto

### 🔑 Modelos

- **User**:
  - Responsável pelo gerenciamento de usuários.
  - Campos disponíveis: `name`, `email`, `password`.
  - Implementa autenticação com Laravel Sanctum.

- **Project**:
  - Representa um projeto no sistema.
  - Campos disponíveis: `name`, `description`.
  - Relacionamento: Um projeto pode ter várias tarefas.

- **Task**:
  - Representa uma tarefa associada a um projeto.
  - Campos disponíveis: `project_id`, `title`, `description`, `image_url`.
  - Relacionamento: Cada tarefa pertence a um projeto.

### Rotas da API

- **Autenticação**:
  - `POST /register`: Registrar um novo usuário.
  - `POST /login`: Fazer login.
  - `POST /logout`: Fazer logout (necessário estar autenticado).

- **Projetos**:
  - `GET /projects`: Listar todos os projetos.
  - `POST /projects`: Criar um novo projeto.
  - `GET /projects/{id}`: Visualizar detalhes de um projeto.
  - `PUT /projects/{id}`: Atualizar um projeto existente.
  - `DELETE /projects/{id}`: Deletar um projeto.

- **Tarefas**:
  - `POST /tasks`: Criar uma nova tarefa.
  - `PUT /tasks/{id}`: Atualizar uma tarefa existente.
  - `DELETE /tasks/{id}`: Deletar uma tarefa.

### 🛡️ Middleware

As rotas protegidas utilizam o seguinte middleware:
- **Sanctum**: Garante que apenas usuários autenticados possam acessar.


## 🛠️ Tecnologias Utilizadas

- **Laravel**: Framework PHP para desenvolvimento web.






