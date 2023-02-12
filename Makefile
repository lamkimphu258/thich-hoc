.PHONY = up down restart build rollback seed admin init

# Production
PRODUCTION_FILE = "production.yml"

up-prod:
	docker-compose -f production.yml up -d

down-prod:
	docker-compose -f production.yml down 

restart-prod: down-prod up-prod

build-prod:
	docker-compose -f $(PRODUCTION_FILE) build $(options)

build-prod-no-cache: 
	$(MAKE) build-prod options="--no-cache"

exec-app-prod:
	docker-compose -f $(PRODUCTION_FILE) exec app sh

# Dev
SAIL=./vendor/bin/sail

ADMIN_NAME=admin
ADMIN_EMAIL=admin@email.com
ADMIN_PASSWORD=password123

up:
	$(SAIL) up -d

down:
	$(SAIL) down

restart: down up

build:
	$(SAIL) build $(options)

migrate:
	$(SAIL) artisan migrate $(options)

rollback:
	$(SAIL) artisan migrate:rollback $(options)

seed:
	$(SAIL) artisan db:seed --class=TagSeeder

admin: 
	$(SAIL) artisan make:filament-user -n --name=$(ADMIN_NAME) --email=$(ADMIN_EMAIL) --password=$(ADMIN_PASSWORD)

init:
	$(MAKE) migrate && $(MAKE) admin && $(MAKE) seed

test-workflow:
	act push --secret-file ../secret/thich_hoc.secrets --artifact-server-path /tmp/artifacts
