# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Instala las dependencias de PHP (puedes ajustar esto según tus necesidades)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Expone el puerto en el que Apache escuchará
EXPOSE 80

# Comando para iniciar el servidor Apache
CMD ["apache2-foreground"]
