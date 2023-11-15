#!/bin/sh

# todas las variables de entorno estén disponibles
if [ -f .env ]; then
  export $(cat .env | sed 's/#.*//g' | xargs)
fi

# Genera la clave de la aplicación si no está establecida
if [ -z "$APP_KEY" ]; then
  php artisan key:generate
  php artisan config:cache
fi

# Ejecuta migraciones de la base de datos
php artisan migrate --force

# Crea el enlace simbólico para el almacenamiento
php artisan storage:link

# Asegúrate de que los directorios de almacenamiento y caché sean escribibles
chmod -R 777 storage bootstrap/cache

# Inicia el servidor Apache
apache2-foreground
