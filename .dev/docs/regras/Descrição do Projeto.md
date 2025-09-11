### Descrição do Projeto – Sistema de Vendas de Ingressos Online e PDV/PDA

#### Visão Geral
O projeto consiste no desenvolvimento de um **sistema completo para venda e gestão de ingressos** integrado a:
- **Plataforma Web (Laravel 12 + Blade):** para vendas online, área administrativa e gerenciamento de eventos.
- **PDV (Ponto de Venda Local - Electron):** atendimento presencial com guichês e emissão de ingressos em impressoras térmicas.
- **PDA (Ponto de Acesso - React):** solução simplificada para controle de acesso em portões específicos, vinculados ao evento.

O sistema deve garantir **performance, escalabilidade, segurança, responsividade, auditabilidade** e aplicar os princípios **SOLID e Clean Code** dentro do padrão **MVC**.

---

#### Requisitos Funcionais

1. **Eventos e Ingressos**
    - Suporte a **eventos em pé** e **eventos com mapa de assentos**.
    - Cadastro de **tipos de ingressos padrão** e **personalizados por evento**.
    - Suporte a **N lotes** (limitados ou ilimitados).
    - Possibilidade de aplicar **cupons de desconto** e **cortesias**.
    - Prevenção contra **uso duplicado de ingressos** com validação online/offline e sincronização automática.
    - Impressão de ingressos (usuário final pelo webapp ou PDV com impressora térmica).
    - Configuração de **taxas de serviço personalizadas** por empresa, por evento, por lote ou globais (controladas em banco de dados).

2. **Vendas e Pagamentos**
    - Métodos suportados: **cartão, pix, boleto, dinheiro, cortesia, etc.**
    - Configuração de **múltiplos gateways de pagamento**, por empresa ou globais.
    - Registro de vendas avulsas no PDV (com ou sem cliente identificado).
    - Opção de vincular venda ao cliente via documento, caso informado.

3. **Gestão de Acesso (PDA)**
    - Controle de entrada por **portão/ponto de acesso**.
    - Cada PDA é associado a um portão previamente cadastrado no evento.

4. **Gestão de Atendimentos (PDV)**
    - Controle por **guichê** e por **atendente ativo**.
    - Integração via **API de services do sistema**, sem duplicação de lógicas.

5. **Usuários e Níveis de Acesso**
    - **Users (administradores do sistema):** totalmente separados das demais tabelas.
    - **Usuários de Empresa (organizadores de eventos e seus colaboradores).**
    - **Clientes finais (público consumidor):** vinculados ao sistema globalmente, com histórico de compras e ingressos.

6. **Portal Público e Experiência do Cliente**
    - Página de listagem de eventos com **filtros avançados**.
    - Página detalhada do evento + fluxo de compra completo.
    - Sugestões personalizadas de eventos para clientes logados (com base em preferências e localização).
    - Versão responsiva e otimizada com **Bootstrap 5, jQuery e Bootstrap Icons**.

7. **Relatórios, Auditoria e Dashboard**
    - Sistema totalmente **auditável**, com registros por empresa e dados globais para administradores.
    - Relatórios completos de vendas, acessos, engajamento e performance.
    - Opções de **exportação de relatórios**.

---

#### Requisitos Técnicos e Boas Práticas
- **Tecnologias**: PHP 8.4, Laravel 12, MariaDB, Redis.
- **Layout**: Blade templates sempre localizados com `@lang` ou `__()`.
- **Enum Strings**: obrigatório para opções em tabelas.
- **Seeds**: para dados iniciais em cenários de fluxo e testes.
- **Documentação**: obrigatoriamente com **PHPDoc**.
- **Geração padrão**: migrations, models, services, controllers e rotas devem ser criados via comando gerador antes da implementação.
- **Arquitetura**: SOLID, Clean Code, MVC, totalmente orientado a objetos.

