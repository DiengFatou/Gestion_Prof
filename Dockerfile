# Étape 1 : Choisir l'image de base
FROM php:8.1-fpm

# Étape 2 : Installer les dépendances nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd dom xml curl

# Étape 3 : Installer Composer (gestionnaire de dépendances PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Étape 4 : Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Étape 5 : Copier le code source de votre application Laravel dans le conteneur
COPY . /var/www/html

# Étape 6 : Installer les dépendances Composer pour Laravel
RUN composer install

# Étape 7 : Définir les permissions pour les fichiers
RUN chown -R www-data:www-data /var/www/html

# Étape 8 : Exposer le port 9000 pour PHP-FPM
EXPOSE 9000

# Étape 9 : Lancer PHP-FPM (le serveur web de PHP)
CMD ["php-fpm"]
