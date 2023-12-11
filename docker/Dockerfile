FROM php:8.1-apache
WORKDIR /var/www/html/

# Define PHP_TIMEZONE env variable
ENV PHP_TIMEZONE Europe/Warsaw

ENV APACHE_DOCUMENT_ROOT /var/www/html/web
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#  start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN touch $PHP_INI_DIR/php.ini \
    && echo "short_open_tag = On;" >> $PHP_INI_DIR/php.ini

RUN { \
		echo 'error_reporting = 4339'; \
		echo 'display_errors = Off'; \
		echo 'display_startup_errors = Off'; \
		echo 'log_errors = On'; \
		echo 'error_log = /dev/stderr'; \
		echo 'log_errors_max_len = 1024'; \
		echo 'ignore_repeated_errors = On'; \
		echo 'ignore_repeated_source = Off'; \
		echo 'html_errors = Off'; \
	} > /usr/local/etc/php/conf.d/error-logging.ini
	

# Enable Apache mod_rewrite
RUN a2enmod rewrite

RUN apt update
	
#install some base extensions
RUN apt-get install -y \
        libzip-dev \
        zip \
        curl \
  && docker-php-ext-install zip	
  
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
# Install PHP extensions
RUN docker-php-ext-install pdo_mysql
RUN apt-get -y install git

# Install node and npm
# RUN touch ~/.bashrc && chmod +x ~/.bashrc
# RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash
# RUN . ~/.nvm/nvm.sh && source ~/.bashrc && nvm install node
# RUN npm install
