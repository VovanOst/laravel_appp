# Используем PHP 8.2 в режиме FPM
FROM php:8.2-fpm

# Устанавливаем рабочую директорию
WORKDIR /home/vovanost

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    locales \
    curl \
    git \
    unzip \
    vim \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка PHP-расширений
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем файлы проекта
COPY . /home/vovanost

# Устанавливаем права
RUN chown -R www-data:www-data /var/www

# Переключаемся на www-data
USER www-data

# Открываем порт 9000
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]
