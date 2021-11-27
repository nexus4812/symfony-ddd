init:
	docker-compose build --force-rm --no-cache
	docker exec -it php bin/console lexik:jwt:generate-keypair

up:
	docker-compose up -d
	echo "App is running at https://127.0.0.1:8030 or http://localhost:8030/"

down:
	docker-compose down

schema-update:
	docker exec -it guess /home/guess/bin/console doctrine:database:create --if-not-exists
	docker exec -it guess /home/guess/bin/console doctrine:schema:update --force

data-fixture:
	docker exec -it guess php bin/console doctrine:fixtures:load

app-mysql:
	docker exec -it mysql mysql -uroot -p123123

app-web:
	docker exec -it guess bash
