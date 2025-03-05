# Usa la imagen oficial de PHP con FPM
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el código fuente de Laravel
COPY . .

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Establece permisos adecuados
RUN chmod -R 777 storage bootstrap/cache

# Expone el puerto de PHP-FPM
EXPOSE 9000

# Comando de inicio
CMD ["php-fpm"]
