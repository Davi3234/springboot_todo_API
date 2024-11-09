FROM --platform=$BUILDPLATFORM php:8.3.12-apache AS builder

CMD ["apache2-foreground"]

FROM builder AS dev

RUN apt-get update && \
    apt-get install -y --no-install-recommends git && \
    useradd -s /bin/bash -m vscode && \
    groupadd docker && \
    usermod -aG docker vscode

COPY --from=gloursdocker/docker / / 

RUN a2enmod rewrite && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug


COPY ./xdebug.ini /usr/local/etc/php/conf.d/

COPY ./httpd.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/
COPY . .

CMD ["apache2-foreground"]
