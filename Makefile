init:
	docker-compose build --force-rm --no-cache

up:
	docker-compose up -d
	echo "App is running at https://127.0.0.1:8030 or http://localhost:8030/"

down:
	docker-compose down