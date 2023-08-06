# Usamos una imagen base de PHP
FROM php:8.1-apache

# Establecemos el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiamos los archivos de la aplicación al contenedor
COPY . /var/www/html


# Exponemos el puerto en el que el servidor web escucha
EXPOSE 80

# Configuración del servidor Apache
RUN a2enmod rewrite

# Comando para iniciar el servidor Apache
CMD ["apache2-foreground"]
