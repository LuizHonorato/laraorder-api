# Introdução

Laraorder - Aplicação para cadastro e consulta de pedidos.

# Pré-requisitos

- Docker
- docker-compose

# Sobre o build

Esta API foi criada com a utilização das seguintes ferramentas:

- Laravel
- Docker
- docker-compose
- PostgresSQL
- Redis
- Servidor Nginx

# Execução

 Para rodar a API garanta que o Docker e o docker-compose estejam instalados e rodando na sua máquina. Após essa verificação rodar o seguinte comando:
 
 - docker-compose up -d
 
 Após o build da image, os containers estarão prontos e a aplicação estará disponível no endereço: http://localhost:8000.
 
 # Teste de envio de e-mail.
 
 Caso desejo testar o envio de e-mails na criação dos pedidos, é necessário criar uma conta no site https://mailtrap.io/, entrar na guia Inboxes, selecionar a opção Laravel no dropdown Integrations, copiar as configurações de variáveis de ambiente e substituir as mesmas no arquivo .env na raíz do projeto. As chaves são as seguintes:
 
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailtrap.io
- MAIL_PORT=2525
- MAIL_USERNAME=
- MAIL_PASSWORD=
- MAIL_ENCRYPTION=tls

Garante que as chaves MAIL_USERNAME e MAIL_PASSWORD estejam preenchidas com os seus dados da API do mailtrap. Após criar um pedido, seguinte o comando no terminal na pasta do projeto:

- docker-compose exec app bash

Ao entrar no container da aplicação rode o seguinte comando para iniciar a fila: 

- php artisan queue:work

Verifique sua caixa de entrada no mailtrap para ver os dados do pedido criado.
