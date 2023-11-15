FROM php:8.1.4-apache@sha256:aaebcaa8ec215715f9226be80dd4c282caa0af333bf2201522eed6e30f4ed2f6

ARG USERNAME=ganaderapp-runner
ARG USER_UID=1000
ARG USER_GID=$USER_UID

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME

COPY . /var/www/html

COPY ./public/.htaccess /var/www/html/.htaccess

RUN cat <<EOF > /etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/public

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

RUN chown -R $USERNAME:$USERNAME .

USER $USERNAME

WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN php artisan key:generate
RUN php artisan migrate:refresh

USER root

RUN a2enmod rewrite

RUN service apache2 restart

USER $USERNAME
