FROM php:fpm
RUN apt-get update -y && apt-get install -y zip unzip git nodejs npm nano
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql
WORKDIR /app
COPY . .
EXPOSE 9000
