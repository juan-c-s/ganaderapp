FROM php:8.2-rc-fpm@sha256:5b6b0ffa84853ebe224141764f3cd8697458b2c570d96b385212876f1fb7b3c9

RUN apt-get update -y && apt-get install -y libmcrypt-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt install unzip, php-xml, php-curl
WORKDIR /app
COPY . /app

RUN composer install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000