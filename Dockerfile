FROM richarvey/nginx-php-fpm:3.1.4

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV DB_CONNECTION pgsql
ENV DB_HOST dpg-ckrvmmnd47qs73evmlog-a
ENV DB_PORT 5432
ENV DB_DATABASE taskmanager_9plj
ENV DB_USERNAME taskmanager_9plj_user
ENV DB_PASSWORD wesa4vqsrjuwB4NdfxZ4GelsH2op7IA0

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]