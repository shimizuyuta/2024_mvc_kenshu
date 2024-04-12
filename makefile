up:
	docker-compose up -d

set-up-first:
	docker-compose exec laravel.test php artisan key:generate && \
	docker-compose exec laravel.test php artisan migrate && \
	docker-compose exec laravel.test npm install && \
	docker-compose exec laravel.test npm run dev
