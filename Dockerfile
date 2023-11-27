# Usa una imagen oficial de PHP con Apache
FROM php:7.4-apache

# Instala dependencias
RUN apt-get update && \
    apt-get install -y libzip-dev unzip libonig-dev && \
    docker-php-ext-install pdo_mysql zip

# Habilita el módulo Apache de reescritura
RUN a2enmod rewrite

# Establece el directorio de trabajo en el directorio de la aplicación
WORKDIR /var/www/html

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de Composer
RUN composer install --optimize-autoloader --no-dev

# Genera las claves de la aplicación y configura el cache
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache

# Configura el almacenamiento y los permisos
RUN php artisan storage:link
RUN chmod -R 775 storage bootstrap/cache

# Expon el puerto 80 del contenedor
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
