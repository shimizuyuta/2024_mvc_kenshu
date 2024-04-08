# Makefile for Laravel Sail

up:
	./vendor/bin/sail up -d

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
