# 🔐 Sistema de Login Moderno

![Demonstração do Sistema](assets/img/exemple.gif)

Um sistema de autenticação moderno e responsivo com interface elegante, animações suaves e recursos de segurança implementados. Desenvolvido com PHP, MySQL, HTML5, CSS3 e JavaScript vanilla.

## 📋 Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Requisitos do Sistema](#-requisitos-do-sistema)
- [Instalação](#-instalação)
- [Configuração](#-configuração)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Como Usar](#-como-usar)
- [Segurança](#-segurança)
- [Troubleshooting](#-troubleshooting)
- [Melhorias Futuras](#-melhorias-futuras)
- [Contribuindo](#-contribuindo)
- [Licença](#-licença)

## 🎯 Sobre o Projeto

Este projeto é um sistema completo de autenticação de usuários que oferece uma experiência moderna e intuitiva. Com design responsivo e animações fluidas, o sistema permite que usuários se cadastrem, façam login e gerenciem suas sessões de forma segura.

O sistema foi desenvolvido seguindo as melhores práticas de segurança web, incluindo hash de senhas, validação de dados, prepared statements para prevenir SQL injection, e gerenciamento de sessões seguro.

## ✨ Funcionalidades

### 🔑 Autenticação
- **Login de usuários**: Autenticação segura com validação de email e senha
- **Cadastro de novos usuários**: Sistema de registro com validações completas
- **Logout**: Encerramento seguro de sessões
- **Gerenciamento de sessões**: Controle de acesso baseado em sessões PHP

### 🎨 Interface
- **Design moderno**: Interface elegante com gradientes e sombras
- **Animações suaves**: Transições fluidas entre formulários de login e cadastro
- **Responsividade**: Adaptável para desktop, tablet e mobile
- **Ícones sociais**: Interface preparada para integração com redes sociais (Google, Facebook, GitHub, LinkedIn)
- **Feedback visual**: Mensagens de erro e sucesso exibidas de forma clara

### 🔒 Segurança
- **Hash de senhas**: Utiliza `password_hash()` com algoritmo bcrypt
- **Validação de email**: Verificação do formato de email no frontend e backend
- **Prepared Statements**: Proteção contra SQL Injection
- **Validação de dados**: Verificação de campos obrigatórios e tamanho mínimo de senha
- **Tratamento de erros**: Mensagens de erro específicas e informativas

### 📱 UX/UI
- **Toggle entre formulários**: Alternância suave entre login e cadastro
- **Validação em tempo real**: Feedback imediato ao usuário
- **Mensagens contextuais**: Notificações claras de sucesso e erro
- **Auto-hide de mensagens**: Mensagens desaparecem automaticamente após 5 segundos

## 💻 Tecnologias Utilizadas

- **Frontend:**
  - HTML5 (Estrutura semântica)
  - CSS3 (Animações, Gradientes, Flexbox)
  - JavaScript (Vanilla JS - Sem dependências)
  - Font Awesome (Ícones)

- **Backend:**
  - PHP 7.0+ (Lógica de servidor)
  - MySQL (Banco de dados)
  - Sessões PHP (Gerenciamento de autenticação)

- **Ferramentas:**
  - XAMPP/WAMP (Ambiente de desenvolvimento)
  - Git (Controle de versão)

## 🛠️ Requisitos do Sistema

### Servidor
- Servidor web local (XAMPP, WAMP, MAMP ou similar)
- PHP 7.0 ou superior
- MySQL 5.7 ou superior
- Apache/Nginx

### Navegador
- Chrome, Firefox, Safari, Edge (últimas versões)
- JavaScript habilitado

## 📦 Instalação

### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/seu-usuario/login_moderno.git
```

Ou baixe o arquivo ZIP e extraia na pasta desejada.

### Passo 2: Configurar o Ambiente

1. **Copie o projeto para a pasta do servidor web:**
   - **XAMPP**: `C:\xampp\htdocs\login_moderno`
   - **WAMP**: `C:\wamp64\www\login_moderno`
   - **MAMP**: `/Applications/MAMP/htdocs/login_moderno`

2. **Inicie o servidor web:**
   - Abra o XAMPP/WAMP/MAMP
   - Inicie os serviços Apache e MySQL

### Passo 3: Criar o Banco de Dados

1. Acesse o phpMyAdmin: `http://localhost/phpmyadmin`
2. Crie um novo banco de dados chamado `cadastro_app`
3. Execute o seguinte SQL para criar a tabela de usuários:

```sql
CREATE DATABASE IF NOT EXISTS cadastro_app;
USE cadastro_app;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Passo 4: Configurar a Conexão

Edite o arquivo `assets/php/conexao.php` e ajuste as credenciais do banco de dados:

```php
$host = "localhost";
$usuario = "root";        // Seu usuário do MySQL
$senha = "";              // Sua senha do MySQL
$banco = "cadastro_app";  // Nome do banco de dados
```

## ⚙️ Configuração

### Configuração do Banco de Dados

O arquivo `assets/php/conexao.php` contém as configurações de conexão. Ajuste conforme seu ambiente:

```php
$host = "localhost";      // Host do banco de dados
$usuario = "root";        // Usuário do MySQL
$senha = "";              // Senha do MySQL
$banco = "cadastro_app";  // Nome do banco de dados
```

### Configuração de Redirecionamento

Após o login bem-sucedido, o usuário é redirecionado para `/login_moderno/index.php`. Certifique-se de criar essa página ou modificar o redirecionamento em `assets/php/login.php`:

```php
header("Location: /login_moderno/index.php");
```

## 📁 Estrutura do Projeto

```
login_moderno/
│
├── assets/
│   ├── css/
│   │   └── style.css              # Estilos principais e animações
│   │
│   ├── img/
│   │   └── exemple.gif            # Gif de demonstração
│   │
│   ├── js/
│   │   └── script.js              # Lógica JavaScript (toggle, mensagens)
│   │
│   └── php/
│       ├── conexao.php            # Arquivo de conexão com banco de dados
│       ├── login.php              # Processamento de login
│       ├── cadastrar.php          # Processamento de cadastro
│       └── logout.php             # Encerramento de sessão
│
├── login.html                     # Página principal (login/cadastro)
└── README.md                      # Documentação do projeto
```

### Descrição dos Arquivos

- **login.html**: Página principal com formulários de login e cadastro
- **assets/css/style.css**: Estilos CSS com animações e design responsivo
- **assets/js/script.js**: JavaScript para toggle entre formulários e tratamento de mensagens
- **assets/php/conexao.php**: Configuração de conexão com MySQL
- **assets/php/login.php**: Validação e autenticação de usuários
- **assets/php/cadastrar.php**: Cadastro de novos usuários com validações
- **assets/php/logout.php**: Encerramento de sessão do usuário

## 🚀 Como Usar

### Acessar o Sistema

1. Inicie o servidor web (Apache e MySQL)
2. Acesse no navegador: `http://localhost/login_moderno/login.html`

### Cadastrar um Novo Usuário

1. Na página inicial, clique no botão "Criar Conta" ou no botão do painel direito
2. Preencha os campos:
   - **Nome Completo**: Seu nome completo
   - **Email**: Seu endereço de email válido
   - **Senha**: Mínimo de 6 caracteres
3. Clique em "Criar Conta"
4. Aguarde a mensagem de sucesso
5. Faça login com suas credenciais

### Fazer Login

1. Na página inicial, certifique-se de estar no formulário de login
2. Digite seu email e senha
3. Clique em "Entrar"
4. Você será redirecionado para a página principal do sistema

### Fazer Logout

1. Acesse a página de logout: `http://localhost/login_moderno/assets/php/logout.php`
2. Sua sessão será encerrada e você será redirecionado para a página de login

## 🔒 Segurança

### Medidas de Segurança Implementadas

1. **Hash de Senhas**: Utiliza `password_hash()` com algoritmo bcrypt
2. **Prepared Statements**: Proteção contra SQL Injection
3. **Validação de Dados**: Validação no frontend e backend
4. **Sessões Seguras**: Gerenciamento de sessões com PHP
5. **Email Único**: Verificação de email duplicado no cadastro
6. **Sanitização**: Limpeza de dados de entrada com `trim()`
7. **Validação de Email**: Verificação de formato de email válido

### Recomendações de Segurança

- **Produção**: Use HTTPS para todas as conexões
- **Banco de Dados**: Altere as credenciais padrão do MySQL
- **Senhas**: Implemente políticas de senha mais rigorosas
- **Sessões**: Configure timeouts de sessão apropriados
- **CSRF**: Considere adicionar proteção CSRF para formulários
- **Rate Limiting**: Implemente limites de tentativas de login

## 🐛 Troubleshooting

### Problemas Comuns

#### Erro de Conexão com Banco de Dados

**Problema**: "Falha na conexão"

**Solução**:
1. Verifique se o MySQL está rodando
2. Confirme as credenciais em `assets/php/conexao.php`
3. Verifique se o banco de dados `cadastro_app` existe
4. Confirme que a tabela `users` foi criada

#### Página em Branco

**Problema**: Página não carrega ou aparece em branco

**Solução**:
1. Verifique se o Apache está rodando
2. Confirme o caminho do arquivo no navegador
3. Verifique os logs de erro do PHP
4. Certifique-se de que todos os arquivos estão no local correto

#### Erro ao Cadastrar Usuário

**Problema**: "Erro ao cadastrar"

**Solução**:
1. Verifique se o email já existe no banco de dados
2. Confirme que a senha tem pelo menos 6 caracteres
3. Verifique se o formato do email é válido
4. Confirme que todos os campos foram preenchidos

#### Mensagens de Erro Não Aparecem

**Problema**: Mensagens de erro/sucesso não são exibidas

**Solução**:
1. Verifique se o JavaScript está habilitado no navegador
2. Abra o console do navegador (F12) para ver erros
3. Confirme que o arquivo `script.js` está carregando corretamente

#### Redirecionamento Após Login Não Funciona

**Problema**: Após login, aparece erro 404

**Solução**:
1. Crie o arquivo `index.php` na raiz do projeto
2. Ou modifique o redirecionamento em `assets/php/login.php`
3. Verifique os caminhos absolutos nos arquivos PHP

## 🔮 Melhorias Futuras

- [ ] Recuperação de senha por email
- [ ] Autenticação de dois fatores (2FA)
- [ ] Integração com OAuth (Google, Facebook, GitHub)
- [ ] Perfil do usuário editável
- [ ] Upload de foto de perfil
- [ ] Histórico de login
- [ ] Lembrar-me (Remember me)
- [ ] Verificação de email
- [ ] API REST para integração
- [ ] Dashboard administrativo
- [ ] Suporte a múltiplos idiomas
- [ ] Testes automatizados
- [ ] Dockerização do projeto

## 🤝 Contribuindo

Contribuições são sempre bem-vindas! Siga estes passos:

1. **Fork o projeto**
2. **Crie uma branch para sua feature** (`git checkout -b feature/AmazingFeature`)
3. **Commit suas mudanças** (`git commit -m 'Add some AmazingFeature'`)
4. **Push para a branch** (`git push origin feature/AmazingFeature`)
5. **Abra um Pull Request**

### Padrões de Código

- Use nomes descritivos para variáveis e funções
- Comente código complexo
- Siga o padrão PSR para PHP
- Mantenha o código limpo e organizado
- Teste suas alterações antes de enviar

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**Seu Nome**

- GitHub: [@seu-usuario](https://github.com/seu-usuario)
- Email: seu-email@example.com

## 🙏 Agradecimentos

- [Font Awesome](https://fontawesome.com/) pelos ícones
- [Google Fonts](https://fonts.google.com/) pela fonte Montserrat
- Comunidade open source pelas inspirações e contribuições

---

⭐ Se este projeto foi útil para você, considere dar uma estrela no repositório!