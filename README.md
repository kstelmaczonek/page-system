Page System
requirements: composer && docker
run:

composer install
docker-compose up -d
symfony serve -d

open url in browser
