# Gunakan image PHP dengan Apache
FROM php:7.4-apache

# Copy source code ke direktori /var/www/html
COPY public/ /var/www/html/
COPY api/ /var/www/html/api/
COPY db/ /var/www/html/db/

# Install MySQLi extension
RUN docker-php-ext-install mysqli
