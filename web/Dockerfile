FROM php:7.0.9-apache

# composerをあらかじめパスの通ったところに置いておく
ADD composer.phar /usr/local/bin/composer

RUN apt-get update
RUN apt-get -y install \
    zlib1g-dev

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    tokenizer

RUN a2enmod rewrite

RUN apt-get -y install wkhtmltopdf