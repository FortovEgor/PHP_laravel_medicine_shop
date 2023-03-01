# Отчет

## Задание
Создать веб-приложение “интернет-магазин” медицинских товаров

## Базовые функции:
- Пользователи делятся на 3 роли: Администратор, покупатель и анонимный пользователь. (РЕАЛИЗОВАНО, примечание: без регистрации на сайте пользователь является анонимом, при регистрации - покупателем, а чтобы стать админом, надо внести email от регистрации админа в список админов на сервере - так достигается наибольшая безопасность)
- Пользователь: Id_ пользователя, email, пароль, фио, роль (РЕАЛИЗОВАНО)
- Администратор имеет возможность управлять списком пользователей, вносить изменения в каталог товаров, просмотр списка заказов и информации о заказах. (РЕАЛИЗОВАНО, примечание: реализация управления пользователями только на сервере, для большей безопасности)
- Анонимный пользователь - просмотр каталога товаров и поиск по каталогу. (РЕАЛИЗОВАНО, примечание: сделан интерактивный поиск товаров с определенным названием - даже перезагружать страницу не требуется)
- Покупатель - поиск по каталогу и просмотр каталога товаров, создание заказа, просмотр списка собственных заказов. (РЕАЛИЗОВАНО, примечание: аналогично предыдущему пункту + создание заказа и просмотр корзины реализованы низкоуровнево: через сессии, локальное хранилище)

## Дополнительно: 
- Возможность ведения каталога товаров (РЕАЛИЗОВАНО)
- Товары распределены по категориям (РЕАЛИЗОВАНО, примечание: для наглядности категория всех имеющихся товаров = medicine)
- Товар: id_товара, название, описание, цена, категория, ссылка на изображение (РЕАЛИЗОВАНО)
- Категория: id_ Категория, название, описание, родительская категория (РЕАЛИЗОВАНО, примечание: категория хранится как отдельное поле для каждого товара)
- Создания заказов. (РЕАЛИЗОВАНО, примечание: набрав в корзину нужные товары, пользователь может сделать заказ)
- Номер заказа, дата заказа, id_товара, количество

#### Примечание
Работа выполнена в рамках НИСа "Разработка веб-приложений и сервисов на PHP", 2-ой курс, ПИ, ФКН, ВШЭ, 2022-2023
