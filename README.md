# Сервис “Перевод денег”

Данное приложение позволяет переводить деньги между двумя пользователями Jon и Smith. 
У каждого пользователя изначально на счету 1000.

## Использованные технологии

* Laravel 5.6
* PostgreSQL 9.6

## Установка

Пример конфигурации в файле **.env.example**.

**Этапы:**
* Клонируйте репозиторий
* Создайте в корне проекта и заполните конфигурационный файл **.env**
* Обновите зависимости  ``` composer update  ```
* Примените миграции ``` php artisan migrate --force ```
* Загрузите начальные данные в БД ``` php artisan db:seed ```

## Использование

**Пример перевода средств**

Для перевода 1000 уе от пользователя Jon пользователю Smith выполните в консоле команду: ``` php artisan money:send Smith Jon 1000 ```

## Комментарии

Обеспечение целостности данных было реализованно с преминением хранимой функции (миграция 2018_03_18_044435_add_function_for_sending_money)


