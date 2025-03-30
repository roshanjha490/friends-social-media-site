FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd mbstring pdo_mysql mysqli  


WORKDIR /var/www

COPY . ./

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer install


RUN sed -i 's/9000/9082/' /usr/local/etc/php-fpm.d/zz-docker.conf


# EXPOSE 8082

# RUN chown -R www-data:www-data storage bootstrap/cache

# RUN chmod -R 775 storage bootstrap/cache