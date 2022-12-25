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

make init:
	migrate && admin && seed
