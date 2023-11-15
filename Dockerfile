FROM php:8.1.4-apache
#Actualizar lista de paquetes e instalar dependencias
RUN apt-get update -y && apt-get install -y openssl zip unzip git
# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql
# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Copiar el código fuente
COPY . /var/www/html
# Configurar htaccess
COPY ./public/.htaccess /var/www/html/.htaccess
# Configurar el directorio de trabajo
WORKDIR /var/www/html
# Instalar dependencias de Composer
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

COPY .env.example .env
# Generar clave de la aplicación
RUN php artisan key:generate
# Ejecutar migraciones
RUN php artisan migrate --force
# Crear enlaces simbólicos para storage
RUN php artisan storage:link 
# Configurar permisos adecuados para la carpeta storage
RUN chmod -R 777 storage
# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite
RUN service apache2 restart
