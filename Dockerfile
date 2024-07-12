FROM appiersign/php8.3

WORKDIR /var/www/html

COPY . .

RUN mv .env.staging .env

RUN chmod -R guo+wrx storage public

RUN composer install

ENTRYPOINT php artisan migrate --force && php artisan cache:clear && php artisan queue:restart && php artisan serve --host=0.0.0.0 --port=80
