# Információk #

## Új Laravel project létrehozása

1. [Composer installer](https://github.com/totadavid95/PhpComposerInstaller)
    - `php -v`
    - `composer -V`
2. [Node.js installer](https://nodejs.org/en/download/)
    - `node -v`
    - `npm -v`
3. `composer create-project --prefer-dist laravel/laravel first_laravel_app`
4. `cd .\first_laravel_app\`
5. `npm install`
6. `php artisan serve`

## Megkezdett Laravel project beüzemelése git-ből

1. `composer install`
2. `copy .\.env.example .env`
3. `php artisan key:generate`
4. `php artisan serve`

## Hasznos vscode addonok

- Laravel Blade Snippets
- Laravel Snippets
- PHP Intelephense

## CSS
- [Tailwind](https://tailwindcss.com/docs/installation)
    - Laravel Breeze: 
        1. `composer require laravel/breeze --dev`
        2. `php artisan breeze:install`
            - react + blade -> létrehozza a views-ben a mintákat
            - PHPUnit
        3. Frontend buildelése `npm run build` vagy `npm run dev` (folyamatosan fut a háttérben)
- [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
    - Laravel UI

## Icons
- [FontAwesome](https://fontawesome.com/icons)
    - [FortAwesome](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
        - `npm i @fortawesome/fontawesome-free`

## Egyéb
- [Alpine.js](https://alpinejs.dev/)
- [Vanilla-picker](https://www.npmjs.com/package/vanilla-picker)
    - `npm i vanilla-picker`