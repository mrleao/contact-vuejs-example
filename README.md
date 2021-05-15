## Como rodar o projeto?

### OBS: É PRESICO TER O DOCKER INSTALADO EM SUA MÁQUINA

1) cópie o .env.exemple para .env
2) execute o comando: sudo docker-composer up -d
3) entre no container php com comando: sudo docker exec -it esocial bash
4) execute o composer install
5) executar o php artisan key:generate para gerar uma nova key laravel
6) executar o npm install && npm run dev ou npm run watch para executar o projeto
7) executar o php artisan migrate para criar as tabelas do banco de dados.

servidor de email http://localhost:8025/

Verifique localhost/ e localhost:8080 para acessar o sistema ou algum outro endereço local da sua máquina.