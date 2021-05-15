COMO RODAR O PROJETO?

É PRESICO TER O DOCKER INSTALADO EM SUA MÁQUINA

1) cópie o .env.exemple para .env
2) execute o comando: sudo docker-composer up -d
3) entre no container php com comando: sudo docker exec -it esocial bash
4) execute o composer install

GERAR UMA NOVA KEY LARAVEL
5) executar o php artisan key:generate

EXECUTAR O PROJETO
6) executar o  npm install && npm run dev ou npm run watch

PARA CRIAR AS TABELAS DO BANCO DE DADOS
7) executar o php artisan migrate 

SERVIDOR DE E-MAIL LOCAL http://localhost:8025/

Verifique localhost/ e localhost:8080 para acessar o sistema ou algum outro endereço local da sua máquina