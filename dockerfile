FROM php:8.1-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY index.php /var/www/html/
COPY index.html /var/www/html/