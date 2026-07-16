FROM dunglas/frankenphp:1.4-alpine AS base

RUN install-php-extensions \
    pdo pdo_pgsql pgsql pdo_sqlite sqlite3 intl bcmath ctype curl dom fileinfo \
    gd iconv mbstring opcache pcntl session tokenizer xml zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=node:22-alpine /usr/local/bin /usr/local/bin
COPY --from=node:22-alpine /usr/local/lib/node_modules /usr/local/lib/node_modules

ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

COPY package.json package-lock.json ./
RUN npm ci --ignore-platform

COPY . .

RUN npm run build \
    && composer install --no-dev --prefer-dist --no-interaction --no-progress \
    && cp .env.example .env \
    && touch database/database.sqlite \
    && php artisan key:generate --force \
    && php artisan storage:link \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

ENV SERVER_NAME=:8080
ENV FRANKENPHP_CONFIG="worker ./public/index.php"
ENV APP_ENV=production
ENV APP_DEBUG=false

HEALTHCHECK --interval=10s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8080/up || exit 1

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
