[Új Laravel project létrehozása]
    1. Composer installer https://github.com/totadavid95/PhpComposerInstaller
        php -v
        composer -V
    2. Node.js installer https://nodejs.org/en/download/
        node -v
        npm -v
    3. composer create-project --prefer-dist laravel/laravel first_laravel_app
    4. cd .\first_laravel_app\
    5. npm install
    6. php artisan serve

[Megkezdett Laravel project beüzemelése git-ből]
    1.  composer install
    2.  copy .\.env.example .env
    3.  php artisan key:generate
    4.  php artisan serve