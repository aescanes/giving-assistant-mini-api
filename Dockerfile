FROM php:7.4-cli

RUN apt update
RUN apt install -y git

COPY . /usr/src/giving_assistance
WORKDIR /usr/src/giving_assistance

RUN mv .env .env_localhost
RUN mv .env_docker .env

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN php artisan migrate:fresh --seed

EXPOSE 80

CMD php -S 0.0.0.0:80 -t public
