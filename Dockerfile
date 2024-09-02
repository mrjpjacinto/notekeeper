FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html

COPY . /var/www/html/

RUN echo "Listen 8989" >> /etc/apache2/ports.conf \
    && sed -i 's/VirtualHost \*:80/VirtualHost \*:8989/' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]