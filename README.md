# laravel
# О проекте
Простой проект по заметкам с аутентификацией
# Документация по установке
1. Установка и настройка Homestead

https://laravel.com/docs/5.7/homestead

2. Установка зависимостей для проекта

`composer install`

3. Установка ключа приложения

Если в корневой папке проекта нет файла `.env`, то следует переименовать файл `.env.example` в `.env`. 

Далее выполнить команду:


`php artisan key:generate` 

4. Выполнение миграций базы данных

`php artisan migrate`
