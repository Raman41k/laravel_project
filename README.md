# Laravel project

## Опис
Проект для компаній

## Встановлення

### Крок 1: Встановлення npm залежностей
Виконайте наступну команду для встановлення всіх необхідних npm пакетів:
```sh
npm install
```
### Крок 2: Встановлення Composer залежностей
Виконайте наступну команду для встановлення всіх необхідних Composer пакетів:
```sh
composer install
```
### Крок 3: Виконання міграцій
Запустіть міграції бази даних, перед цим підключивши її:
```sh
php artisan migrate
```
### Крок 4: Встановлення Backpack
Для встановлення Backpack виконайте наступні команди:
```sh
composer require backpack/crud
php artisan backpack:install
```
### Крок 5: Налаштування оточення
Додайте наступні рядки у ваш .env файл:
```sh
FLATPICKR_CSS_URL=https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css
FLATPICKR_JS_URL=https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js
LATPICKR_LOCALE=de
```
