# Usa una imagen base de PHP con Apache y MySQL
FROM php:8.1-apache

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Establece las variables de entorno para MySQL
ENV MARIADB_ROOT_PASSWORD root
ENV MARIADB_DATABASE test
ENV MARIADB_USER test
ENV MARIADB_PASSWORD test
# Instala el servidor MySQL (puedes usar mariadb-server si prefieres)
RUN apt-get update && apt-get install -y mariadb-server

# Instala las dependencias de PHP para MySQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Expone los puertos de Apache y MySQL
EXPOSE 80 3306

# Comando para iniciar el servidor Apache y MySQL
CMD ["bash", "-c", "service mariadb start && apache2-foreground"]
