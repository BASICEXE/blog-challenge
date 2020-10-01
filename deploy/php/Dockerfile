FROM php:7.3-fpm

# COPY conf/docker-entrypoint.sh /var/tmp
# RUN mv /var/tmp/docker-entrypoint.sh /var/local/bin; \
    # chmod +x /user/local/bin/docker-entrypoint.sh;

COPY conf/php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y libzip-dev default-mysql-client git \
  && docker-php-ext-install zip pdo_mysql

# Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

# blogの設置
RUN git clone -b master --depth=1 https://github.com/BASICEXE/blog-challenge.git /var/blog

WORKDIR /var/blog/www

RUN cd /var/blog/www
RUN composer install

RUN cp .env.prod .env

RUN chown -R www-data:www-data /var/blog

# ENTRYPOINT [ "docker-entrypoint.sh" ]
# CMD [ "echo", "" ]

