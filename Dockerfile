FROM php:8.5-apache

RUN apt-get update && apt-get install -y git unzip libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && npm ci && npm run build \
    && chown -R www-data:www-data storage bootstrap/cache

# CVE-2026-115560 の暫定対策: セッションのアップロード進捗機能を無効にする
RUN echo "session.upload_progress.enabled = 0" > /usr/local/etc/php/conf.d/99-security.ini

RUN php -v
RUN php -i | grep upload_progress

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Render は PORT 環境変数で待ち受けポートを指定する
CMD sed -i "s/Listen 80/Listen ${PORT:-10000}/" /etc/apache2/ports.conf \
    && sed -i "s/:80/:${PORT:-10000}/" /etc/apache2/sites-available/000-default.conf \
    && apache2-foreground
