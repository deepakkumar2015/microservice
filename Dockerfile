# Use the official PHP 8.1 image
FROM php:8.1

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/microservices

# Copy Laravel application files
COPY . /var/www/microservices

WORKDIR /var/www/microservices
# Install dependencies using Composer
RUN composer install --optimize-autoloader --no-dev

# Generate the Laravel application key
#RUN php artisan key:generate

# Expose port 8080
EXPOSE 8080

# Start the Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8080

