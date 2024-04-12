up:
	docker-compose up -d

set-up-first:
	docker-compose exec artisan key:generate && \
	docker-compose exec artisan migrate && \
	docker-compose exec npm install && \
	docker-compose exec npm run dev
