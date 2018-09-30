FROM composer:1.7.2 as composer
FROM wordpress

RUN docker-php-ext-install bcmath;

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer global require hirak/prestissimo
