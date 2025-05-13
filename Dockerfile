# Bước 1: Sử dụng image PHP có sẵn với FPM
FROM php:8.1-fpm

# Bước 2: Cài đặt các thư viện cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Bước 3: Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Bước 4: Tạo thư mục làm việc cho ứng dụng
WORKDIR /var/www

# Bước 5: Copy file composer.json và cài đặt các dependencies
COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts

# Bước 6: Copy toàn bộ mã nguồn vào container
COPY . .

# Bước 7: Chạy lại composer install sau khi copy toàn bộ mã nguồn
RUN composer install --optimize-autoloader --no-dev

# Bước 8: Cấu hình quyền cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Bước 9: Expose port 9000
EXPOSE 9000

# Bước 10: Sử dụng php-fpm để chạy ứng dụng
CMD ["php-fpm"]
