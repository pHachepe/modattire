FROM php:8.1-alpine

# Instala el controlador PostgreSQL y otras dependencias
RUN apk update \
    && apk add postgresql-dev \
    && docker-php-ext-install pdo_pgsql
