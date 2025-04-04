FROM php:8.0-cli

RUN apt-get update && apt-get install -y \
    build-essential \
    libicu-dev \
    libzip-dev \
    curl \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-source extract \
    && docker-php-ext-install -j$(nproc) intl zip soap \
    && docker-php-source delete

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app
