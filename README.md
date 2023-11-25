# Információk #

## Kezdő lépések

### Új Laravel project létrehozása
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

### Megkezdett Laravel project beüzemelése git-ből
1. `composer install`
2. `copy .\.env.example .env`
3. `php artisan key:generate`
4. `php artisan serve`

### Hasznos vscode addonok
- Laravel Blade Snippets
- Laravel Snippets
- PHP Intelephense

### Random generátor
- [Faker](https://fakerphp.github.io/)

## Frontend

### CSS
- [Tailwind](https://tailwindcss.com/docs/installation)
    - Laravel Breeze: 
        1. `composer require laravel/breeze --dev`
        2. `php artisan breeze:install`
            - react + blade -> létrehozza a views-ben a mintákat
            - PHPUnit
        3. Frontend buildelése `npm run build` vagy `npm run dev` (folyamatosan fut a háttérben)
- [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
    - Laravel UI

### Icons
- [FontAwesome](https://fontawesome.com/icons)
    - [FortAwesome](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
        - `npm i @fortawesome/fontawesome-free`

### Egyéb
- [Alpine.js](https://alpinejs.dev/)
- [Vanilla-picker](https://www.npmjs.com/package/vanilla-picker)
    - `npm i vanilla-picker`

## Adatbázis

### Legfontosabb DB utasítások
- `php artisan tinker`
    - `database_path('database.sqlite')`
- `php artisan list` Kilistázza az ismert artisan parancsokat
- `php artisan cache:clear` Cache műveletek
- `php artisan config:cache` Cache műveletek
- `php artisan migrate:fresh` Minden táblát droppol, majd újra lefuttatja sz összeset.
- SQLite DB megtekintéséhez: [DB Browser for SQLite](https://sqlitebrowser.org/dl/)
    - `blog\database\database.sqlite` DB megnyitása
- `php artisan make:migration Create_valamilyen_table` Újabb migration generálása
- `php artisan migrate:status` Milyen státuszban vagyok? Az új tábla nem futott le
- `php artisan migrate` Csak az új táblát futtatta le.
- `php artisan migrate:status` Most már az új tábla is fut.
- `php artisan migrate:rollback` Mégsem kell az új tábla, így visszavonom.
- [Laravel Helpers](https://laravel.com/docs/10.x/helpers)

- `blog\database\seeders\DatabaseSeeder.php`
    - `\App\Models\User::factory(10)->create();` // Generáljunk 10 db usert a factory-vel - make-el létrehozza, de nem rakja be a DB-be, create-el be is rakja.
- `php artisan db:seed` Meghívom a seederem, ami legenerálja a 10 usert

- `php artisan tinker`
    - `User::all()` Visszaad egy collectiont, amiben benne van a 10 db user adata
    - `User::find(4)` Visszaadja a 4-es ID-jú usert
    - `User::find([4,6])` Visszaadja a 4-es és 6-os ID-jú usert úgy, hogy benne van egy collection-nek, aminek ő egyetlen egy eleme.
    - `User::find(100)` null-t ad vissza, mert nem létezik 100-as ID-jú user
    - `User::findOrFail(100)` Egy exception-t ad vissza, ami jelzi, hogy nem található 100-as id-jú user.
    - `User::where('id','>',5)` Egy query builder-t adott vissza, nem collection-t
    - `User::where('id','>',5)->get()` Ha get-elem, akkor már megkapom a kívánt collection-t
    - `User::where('id','>',5)->orderby('id','DESC')->get()` Tovább fűzhető sql lekérdezések... (Fordított sorrend, nagyobb id jött először.)
    - `User::where('id','>',5)->orderby('id','DESC')->getQuery()` Tovább fűzhető sql lekérdezések... (Lehet látni mit állít be az adott query-n.)
    - A 8-as ID-jú user nevét átírom.
        - Segédváltozóval
            1. `$u = User::find(8)` 
            2. `$u -> name = "Dr. Programo Zoltán"` Még a memóriában történt csak meg a változás, ez az updated_at timestamp-en is látszik.
            3. `$u -> save()` - Adatbázisba mentés
        - Egy sorban ugyanez
            1. `User::find(8)->update(['name' => 'Valami más'])`
    - Időzóna átírása
        1. `blog\config\app.php`
        2. `'timezone' => 'Europe/Budapest',`
    - `User::create(['name'=>'Ez meg az', 'email'=>'ad@ad.hu', 'password'=>'asdasd'])` Új user létrehozása
    - `User::find(11)->delete()` User törlése (Booleanban visszadja, hogy sikeres a törlés.)
    - `User::destroy(9)` User törlése rövidebben (Visszadja, hogy hányat törölt.)
    
    - `php artisan make:model Post -mfs` Kérek hozzák egy migration-t, factory-t és seeder-t

    - `php artisan migrate:fresh --seed`
    - `Post::find(4)->user` A 4-es postot ki írta?
    - `User::find(Post::find(4)->user_id)` ua.
    - `User::find(2)->posts` A 2-es user összes postját szeretném visszakérni 