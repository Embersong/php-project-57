
setup:
	composer install

	touch database/database.sqlite

	cp -n .env.example .env || true

	php artisan key:gen --ansi

	php artisan migrate:fresh --seed

	npm ci

	npm run build

start:
	php artisan migrate:refresh --seed --force && php artisan serve

install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app routes tests

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
