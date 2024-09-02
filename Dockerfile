FROM php:8.1-apache

# Install dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy application code to the container
COPY . /var/www/html/

# Configure Apache
RUN echo "Listen 80" > /etc/apache2/ports.conf \
    && sed -i 's/VirtualHost \*:80/VirtualHost \*:80/' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

# Add ServerName to Apache configuration
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
