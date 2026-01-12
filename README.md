# Docker: Utilização Prática no Cenário de Microsserviços

Este projeto foi desenvolvido como parte do curso de Docker da **digitalinnovation.one (dio.me)**, sob orientação do instrutor **Denilson Bonatti**. O objetivo principal é demonstrar a implementação de uma arquitetura de microsserviços utilizando containers para garantir escalabilidade e alta disponibilidade.

## 📋 Sobre o Projeto

O projeto consiste em uma infraestrutura web que utiliza o Docker para orquestrar três camadas principais: balanceamento de carga, processamento de aplicação e persistência de dados.

### Como a arquitetura funciona:
* **Balanceamento de Carga:** O servidor **Nginx** atua como um proxy reverso, escutando na porta **4500**. Ele distribui as requisições entre diferentes servidores de aplicação configurados no grupo `upstream`.

* **Camada de Aplicação:** Utiliza scripts **PHP** para processar a lógica de negócio. A aplicação gera registros aleatórios e identifica o nome do **Host** (container) que está processando a requisição, facilitando a visualização do balanceamento de carga.

* **Camada de Dados:** Um banco de dados **MySQL** armazena as informações inseridas pela aplicação. A estrutura da tabela é definida para registrar dados como Nome, Sobrenome, Endereço e o Host de origem.

## 🛠️ Componentes Técnicos

* **Docker:** Utilizado para criar e gerenciar as imagens do serviço. Existe um `dockerfile` específico para o Nginx que automatiza a cópia das configurações.

* **Nginx (`nginx.conf`):** Configurado para balancear o tráfego entre múltiplos IPs internos (ex: `172.31.0.37`, `172.31.0.151`).

* **PHP (`index.php`) & HTML (`index.html`):** A interface foi separada em um formulário HTML para entrada de dados. O script PHP processa as informações recebidas via método POST, identifica o nome do container atual (gethostname) e persiste os dados no MySQL.

* **SQL (`banco.sql`):** Script responsável pela criação da tabela `dados` com campos para AlunoID, Nome, Sobrenome, Endereço, Cidade e Host.

## 🚀 Pré-requisitos

Para rodar este projeto, é necessário possuir conhecimentos básicos em:
* **Linux**.
* **Docker**.
* **AWS** (para cenários de deploy em nuvem).

---
*Este é um projeto prático para fins educacionais da plataforma dio.me.*.