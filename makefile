# Makefile for Laravel Sail


set-up-first:
	./vendor/bin/sail artisan key:generate && ./vendor/bin/sail artisan migrate && ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
	
up:
	./vendor/bin/sail up -d
#環境立ち上げ
#migrate
#seed

stop:
	./vendor/bin/sail stop

down:
	./vendor/bin/sail down

install:
	./vendor/bin/sail composer install

migrate:
	./vendor/bin/sail artisan migrate

seed:
	./vendor/bin/sail artisan db:seed

test:
	./vendor/bin/sail artisan test

npm-install:
	./vendor/bin/sail npm install

npm-run-dev:
	./vendor/bin/sail npm run dev

bash:
	./vendor/bin/sail bash
