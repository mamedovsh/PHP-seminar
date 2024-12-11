FROM php:8.2

VOLUME /code

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER 1 

WORKDIR /code

# FROM nginx:latest
# COPY ./hosts/mysite.local.conf·/etc/nginx/conf.d/mysite.local.conf
# WORKDIR /data
# VOLUME /data
# EXPOSE 80
# CMD ["nginx", "daemon off;"]