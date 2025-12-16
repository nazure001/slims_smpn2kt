FROM php:8.1-apache

# Install system deps & PHP extensions commonly needed by SLiMS
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y \
    libzip-dev zip unzip git libpng-dev libjpeg-dev libfreetype6-dev libxml2-dev \
    libonig-dev libicu-dev zlib1g-dev g++ \
  && docker-php-ext-configure gd --with-jpeg --with-freetype \
  && docker-php-ext-install -j$(nproc) pdo pdo_mysql mysqli mbstring zip xml gd intl \
  && a2enmod rewrite headers expires

# Copy only needed files (use .dockerignore to speed up)
# Project's webroot in this repo is under httpd/htdocs/ (as in XAMPP)
WORKDIR /var/www/html

# Copy application files (only httpd/htdocs content into Apache web root)
COPY httpd/htdocs/ /var/www/html/

# Copy composer if present (multi-stage via official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# If composer.json exists in repo root or in httpd/htdocs, install deps
# Use || true to avoid failing if composer.json is absent
RUN if [ -f composer.json ]; then composer install --no-dev --no-interaction --optimize-autoloader; fi || true

# Set ownership & permissions (www-data user)
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;

# Expose port 80 (Railway will map)
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]