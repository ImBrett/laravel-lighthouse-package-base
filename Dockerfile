FROM php:7.4-alpine

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Install and configure PHP extensions
RUN set -xe; \
    \
    apk --update add --no-cache --virtual .php-ext-install-deps \
        libxslt-dev \
        libgcrypt-dev \
    \
    && docker-php-ext-install -j$(nproc) \
        xsl \
    && docker-php-source delete \
    \
    && runDeps="$( \
        scanelf --needed --nobanner --format '%n#p' --recursive /usr/local \
            | tr ',' '\n' \
            | sort -u \
            | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )" \
    && apk add --no-cache $runDeps \
    \
    && apk del --no-network .php-ext-install-deps

# Set working directory
WORKDIR /package

# Copy project
COPY ./ ./

# Install dependancies
RUN composer update --no-scripts
RUN composer dump-autoload
