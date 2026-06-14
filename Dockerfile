FROM php:8.3-cli-bookworm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm ci \
    && npm run build \
    && chmod -R 775 storage bootstrap/cache

COPY docker/start.sh /start.sh
RUN sed -i 's/\r$//' /start.sh docker/00-laravel-deploy.sh \
    && chmod +x /start.sh docker/00-laravel-deploy.sh

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

EXPOSE 10000

CMD ["/start.sh"]
