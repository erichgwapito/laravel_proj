FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --optimize-autoloader
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf
RUN echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/opcache-custom.ini
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache-custom.ini
RUN echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache-custom.ini

EXPOSE 9000


CMD ["php-fpm"]