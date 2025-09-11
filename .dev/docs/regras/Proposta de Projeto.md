### **Proposta de Projeto: Sistema Integrado de Gestão e Venda de Ingressos**

#### **1. Resumo Executivo**

Este projeto visa o desenvolvimento de uma plataforma completa e robusta para a gestão e venda de ingressos, denominada "Sistema Integrado de Ingressos". A solução será composta por três módulos centrais e interdependentes: uma **Plataforma Web** para vendas online e gestão, um **Ponto de Venda (PDV)** local para vendas físicas e um **Ponto de Acesso (PDA)** para validação de ingressos na entrada dos eventos.

O sistema será projetado para ser altamente escalável, seguro e modular, seguindo os princípios de **SOLID** e **Clean Code** sobre uma arquitetura **MVC**. A tecnologia base será **Laravel 12** e **PHP 8.4**, garantindo uma base moderna e de alta performance.

#### **2. Módulos Principais**

1.  **Plataforma Web (Core - Laravel 12)**
    * **Frontend Público:** Site responsivo e otimizado para a descoberta e compra de ingressos por clientes finais.
    * **Painel da Empresa/Organizador:** Área administrativa para que as empresas criem e gerenciem seus eventos, lotes, preços, colaboradores e acessem relatórios financeiros e operacionais.
    * **Painel do Administrador do Sistema:** Interface de controle global para a gestão de empresas, configurações do sistema, taxas padrão, gateways de pagamento e acesso a dados de auditoria completos.

2.  **Ponto de Venda - PDV (Electron)**
    * Aplicação desktop para vendas presenciais em bilheterias.
    * Será desenvolvida após a conclusão da plataforma web e sua API.
    * Consumirá os *services* da aplicação Laravel, evitando duplicidade de código e centralizando a lógica de negócio.
    * Possuirá controle de acesso por guichê e por atendente.

3.  **Ponto de Acesso - PDA (React)**
    * Aplicação web simplificada e mobile-first para a validação de ingressos na portaria do evento.
    * Configurável por evento e por ponto de acesso específico (ex: Portão A, Portão B).
    * Projetado para operar com segurança, evitando o uso duplicado de ingressos, e com suporte a funcionamento offline com sincronização automática de dados.

#### **3. Requisitos Funcionais Detalhados**

**3.1. Gestão de Eventos**
* **Tipos de Evento:** Suporte para eventos com "Pista" (em pé) e eventos com "Mapa de Assentos" numerados e selecionáveis.
* **Tipos de Ingresso:** Empresas poderão configurar tipos de ingressos padrão (ex: Inteira, Meia) e criar tipos personalizados por evento.
* **Lotes:** Capacidade de criar múltiplos lotes (N) por tipo de ingresso, com controle de quantidade (limitada ou ilimitada) e período de venda.
* **Cupons e Cortesias:** Funcionalidade para criar cupons de desconto (percentual ou valor fixo) e gerar ingressos de cortesia.

**3.2. Gestão de Usuários e Níveis de Acesso**
O sistema terá uma estrutura de acesso multi-nível com segregação clara de dados, utilizando tabelas distintas:
* **Administradores do Sistema (`users`):** Acesso irrestrito a todas as funcionalidades e dados globais.
* **Empresas/Organizadores:** Entidades que criam eventos. Gerenciam seus próprios eventos, colaboradores e dados financeiros.
* **Colaboradores:** Usuários cadastrados por uma Empresa, com permissões específicas dentro do escopo daquela empresa.
* **Clientes Finais:** Conta única no sistema, não vinculada a uma empresa específica. O cliente terá um histórico unificado de todas as suas compras, ingressos e atividades na plataforma.

**3.3. Vendas e Pagamentos**
* **Meios de Pagamento:** Suporte a Cartão de Crédito/Débito, PIX, Boleto, Dinheiro (via PDV) e Cortesia.
* **Gateways de Pagamento:** Arquitetura para permitir o cadastro de múltiplos gateways. A configuração poderá ser definida globalmente pelo administrador ou de forma personalizada por cada empresa.
* **Taxas de Serviço:** Sistema flexível para configuração de taxas, que poderão ser definidas em nível global, por empresa, por evento ou até mesmo por lote de ingressos. Todas as configurações de taxas serão gerenciadas via banco de dados.

**3.4. Plataforma Pública e Experiência do Cliente**
* **Descoberta de Eventos:** Página inicial com listagem de todos os eventos públicos, com um sistema de **filtros avançados** (localidade, data, tipo de evento, etc.).
* **Personalização:** Para clientes logados, o sistema oferecerá sugestões de eventos personalizadas com base em seu histórico de compras, preferências e localização.
* **Compra de Ingressos:** Fluxo de compra intuitivo e seguro.
* **Acesso ao Ingresso:** O cliente poderá imprimir o ingresso a partir do site ou apresentá-lo diretamente pelo painel do cliente no webapp.

**3.5. Funcionalidades do PDV e PDA**
* **Impressão Térmica (PDV):** Suporte para impressão de ingressos em impressoras térmicas para compras presenciais.
* **Venda Avulsa (PDV):** Possibilidade de realizar vendas sem associar a um cliente. Opcionalmente, o atendente poderá vincular a venda a um cliente informando seu documento (CPF), caso ele já possua cadastro.

#### **4. Requisitos Técnicos e de Arquitetura**

* **Stack Principal:**
    * **Backend:** PHP 8.4, Laravel 12
    * **Banco de Dados:** MariaDB
    * **Cache/Filas:** Redis
* **Frontend (Plataforma Web):**
    * Views em **Blade**, com layout bonito, consistente, otimizado e responsivo.
    * **Bootstrap 5**, JavaScript, jQuery e Bootstrap Icons.
* **Princípios e Padrões:**
    * **SOLID & Clean Code:** Aderência estrita a estes princípios em toda a base de código.
    * **MVC:** Arquitetura padrão para a organização do código.
    * **Orientação a Objetos:** Utilização massiva de conceitos OO, especialmente na reutilização de *Services* pela API do PDV.
* **Processos de Desenvolvimento:**
    * **Geração de Código:** Utilização obrigatória dos comandos `artisan make:*` para criar Models, Migrations, Services, Controllers, etc., antes da implementação.
    * **Localização (i18n):** O layout **SEMPRE** será localizado. Todo texto visível ao usuário deve utilizar as funções `@lang()` ou `__()` do Laravel.
    * **Estrutura de Dados:** Para campos de opções em tabelas, será mandatório o uso de **Enums do PHP 8+** para garantir consistência e legibilidade.
    * **Documentação:** Todo o código deverá ser documentado utilizando o padrão **PHPDoc**.
    * **Rotas:** Definição explícita e organizada de todas as rotas da aplicação.
    * **Dados Iniciais (Seeds):** Utilização de *seeds* para popular o banco de dados com dados essenciais para o funcionamento e teste do sistema.

#### **5. Auditoria, Relatórios e Segurança**

* **Auditoria Completa:** O sistema registrará todas as ações críticas.
    * **Nível Empresa:** As empresas terão acesso a um log de auditoria de todas as operações relacionadas aos seus eventos e usuários.
    * **Nível Global:** Os administradores terão acesso a uma visão de auditoria completa de todo o sistema.
* **Dashboards e Relatórios:** Painéis administrativos apresentarão dados consolidados e relatórios detalhados (financeiros, de vendas, de acesso), com opção de **exportação de dados** (CSV, PDF).
* **Segurança de Ingressos:** Mecanismos robustos para prevenir a fraude e o uso duplicado de ingressos, integrados ao sistema de validação do PDA.
