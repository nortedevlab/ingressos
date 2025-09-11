# Documento de Requisitos de Software (SRS)
## Sistema de Vendas de Ingressos Online, PDV e PDA

### 1. Introdução

#### 1.1. Objetivo
Este documento descreve os requisitos funcionais, não funcionais e técnicos para o desenvolvimento de um **sistema completo de venda e gestão de ingressos**, integrado a:
- **Plataforma Web (Laravel 12 + Blade)**: vendas online e administração do sistema.
- **PDV (Ponto de Venda Local - Electron)**: atendimento presencial com emissão de ingressos em impressora térmica.
- **PDA (Ponto de Acesso - React)**: controle de acesso e validação de ingressos em portões específicos.

O sistema deve ser construído utilizando **PHP 8.4, Laravel 12, MariaDB e Redis**, seguindo princípios de **SOLID, Clean Code e MVC**.

#### 1.2. Público-Alvo
- **Administradores do sistema (global)**;
- **Empresas organizadoras de eventos e seus colaboradores**;
- **Clientes finais (público consumidor)**.

---

### 2. Escopo do Sistema

O sistema permitirá:
- Cadastro e gerenciamento de **eventos, ingressos e lotes**;
- Vendas **online (web)** e **locais (PDV)**;
- **Controle de acesso** via PDA (associado a portões específicos);
- Gestão de **pagamentos, taxas, cupons e cortesias**;
- **Relatórios e auditoria completos**, com exportação de dados;
- Portal público para divulgação de eventos, compra de ingressos e personalização de recomendações.

---

### 3. Requisitos Funcionais

#### 3.1. Gestão de Eventos e Ingressos
1. O sistema deve suportar eventos **em pé** e **com mapa de assentos**.
2. Empresas podem cadastrar:
    - Tipos de ingressos padrão e personalizados por evento;
    - Lotes ilimitados ou limitados;
    - Cupons de desconto e ingressos cortesia.
3. Deve evitar o uso duplicado de ingressos com validação **online** e **offline (sincronização automática)**.
4. Deve permitir impressão de ingressos:
    - Pelo usuário no **webapp**;
    - Pelo atendente no **PDV em impressora térmica**.

#### 3.2. Gestão de Vendas e Pagamentos
1. Métodos de pagamento suportados: **cartão, pix, boleto, dinheiro, cortesia, etc.**
2. Deve ser possível cadastrar múltiplos **gateways de pagamento** por empresa ou globalmente.
3. Vendas no PDV podem ser avulsas (sem cliente) ou vinculadas ao cliente por documento.
4. Taxas de serviço podem ser definidas por:
    - Empresa;
    - Evento;
    - Lote;
    - Configuração global.

#### 3.3. Controle de Acesso (PDA)
1. Cada PDA deve estar vinculado a um portão previamente configurado no evento.
2. O sistema deve registrar logs de entrada por portão/ponto de acesso.

#### 3.4. Gestão de Atendimentos (PDV)
1. O PDV deve controlar atendimentos por **guichê** e por **atendente ativo**.
2. Toda integração do PDV deve ser feita via **API de services**, evitando duplicação de código.

#### 3.5. Gestão de Usuários e Níveis de Acesso
1. **Usuários administradores (global):** armazenados na tabela `users`.
2. **Usuários de empresa (organizadores e colaboradores):** separados de `users`.
3. **Clientes (consumidores):** vinculados ao sistema globalmente, com histórico de compras e ingressos.

#### 3.6. Portal Público e Experiência do Cliente
1. Deve existir um portal público com:
    - Listagem de eventos com **filtros avançados**;
    - Página detalhe do evento;
    - Fluxo completo de compra de ingressos.
2. Para clientes logados, o sistema deve oferecer **sugestões personalizadas** de eventos com base em preferências e localização.
3. O site deve ser **responsivo e otimizado**, usando:
    - **Bootstrap 5**;
    - **JavaScript + jQuery**;
    - **Bootstrap Icons**.

#### 3.7. Relatórios e Auditoria
1. O sistema deve ser totalmente **auditável**:
    - Dados por empresa;
    - Dados globais de administração.
2. Deve oferecer relatórios completos em dashboards e opões de exportação.

---

### 4. Requisitos Técnicos e Boas Práticas

1. O sistema deve utilizar **PHP 8.4, Laravel 12, MariaDB e Redis**.
2. O layout deve ser implementado em **Blade** e sempre localizado com `@lang` ou `__()`.
3. Em tabelas, as opções devem ser armazenadas como **strings de Enum do PHP**.
4. Seeds devem ser usados sempre que possível para dados iniciais.
5. Toda a aplicação deve seguir **MVC, SOLID e Clean Code**.
6. Devem ser criadas **migrations, models, services, controllers e rotas via comandos geradores**.
7. Todo código deve ser devidamente documentado com **PHPDoc**.

---

### 5. Requisitos Não Funcionais

- **Disponibilidade:** sistema deve suportar uso offline com sincronização automática.
- **Segurança:** evitar fraude ou uso duplicado de ingressos.
- **Escalabilidade:** suporte a eventos de grande porte e alta demanda.
- **Usabilidade:** interface amigável, responsiva e consistente em todos os dispositivos.

