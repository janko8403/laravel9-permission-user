# Wymagania

composer 2  
php 8.0.17+  
node 17  
npm 8.1

# Instalacja

```
composer install

```

```
npm install
```

Kompilujemy

```
npm run dev
```

W środowisku lokalnym

```
npm run watch
```

Generujemy klucze

```
php artisan key:generate
```

Podstawowa konfiguracja i ustawienia bazy danych

```
cp .env.example .env
```

```
vim .env
```

Uruchamiamy migracje

```
php artisan migrate --seed

```

Optymalizacja tras w cache

```
php artisan route:cache
```

CMD

```
php artisan serve
```

# JS

npm run development -> kompilacja js,css
