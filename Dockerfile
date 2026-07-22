FROM php:8.2-fpm-alpine

# System dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS linux-headers \
    && docker-php-ext-install pdo_mysql zip gd opcache \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

# Opcache tuning for production
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'opcache.max_accelerated_files=10000'; \
    echo 'opcache.memory_consumption=192'; \
    echo 'opcache.max_wasted_percentage=10'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.fast_shutdown=1'; \
} > /usr/local/etc/php/conf.d/opcache.ini

# PHP runtime limits — the portfolio is one large page (project galleries + full
# ecosystem catalog); 128M peaked mid-render and truncated the response.
RUN { \
    echo 'memory_limit=512M'; \
} > /usr/local/etc/php/conf.d/zz-runtime.ini

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app
COPY . .

# Install PHP dependencies (production only)
# El lock está resuelto para PHP 8.1 (config.platform.php en composer.json),
# así que ya no hace falta --ignore-platform-reqs.
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --no-scripts \
    && composer dump-autoload --optimize --no-dev --no-scripts

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# nginx runs its workers as www-data (see nginx.conf); make its temp/cache dirs
# writable so a large FastCGI response can spill to disk instead of truncating.
RUN mkdir -p /var/lib/nginx/tmp/fastcgi /var/lib/nginx/tmp/client_body \
    && chown -R www-data:www-data /var/lib/nginx /var/log/nginx

# Nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

# PHP-FPM pool personalizado (max_children=20, max_requests=500)
COPY docker/www.conf /usr/local/etc/php-fpm.d/www.conf

# Supervisor config (runs nginx + php-fpm together)
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
