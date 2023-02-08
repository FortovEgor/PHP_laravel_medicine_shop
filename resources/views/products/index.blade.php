{{--@extends('layouts.app')--}}

@section('title', 'Карточка товара')

@section('content')
    <style>
        .btn_special {
            display: inline-block; /* Строчно-блочный элемент */
            background: green; /* Серый цвет фона */
            color: #fff; /* Белый цвет текста */
            padding: 1rem 1.5rem; /* Поля вокруг текста */
            text-decoration: none; /* Убираем подчёркивание */
            border-radius: 30px; /* Скругляем уголки */
        }
    </style>
    <?php
{{--        if (isset($_GET['namee'])) {--}}
{{--            echo '<script language="javascript">';--}}
{{--            echo 'alert("message successfully sent")';--}}
{{--            echo '</script>';--}}
{{--        } else {--}}
{{----}}
{{--        }--}}
{{--        ?>--}}

{{--    <button class="btn btn-success" href="{{ route('products.create') }}">Создать товар</button>--}}

{{--    <form name="form" action="{{ route('products.index') }}" method="post">--}}
{{--        @csrf--}}
{{--        <input type="text" name="search_item" value="<?php echo $_COOKIE['search_item'];?>" style="width: 500px;"/>--}}
{{--        <input type="submit" name="Submit" value="Поиск" class="btn btn-primary"/>--}}
{{--    </form>--}}
{{--    <?php--}}

{{--        if (isset($_POST['Submit'])) {--}}
{{--            echo '<script language="javascript">';--}}
{{--            echo 'alert("message successfully sent")';--}}
{{--            echo '</script>';--}}
{{--            $_COOKIE['search_item'] = 'askskms';--}}
{{--//            setcookie('search_item', 'dm skks', time() + 24 * 3600);  // срок действия - сутки--}}
{{--        } else {--}}

{{--        }--}}

{{--    ?>--}}

    <a href="{{ route('products.create') }}" class="btn_special">Создать товар</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Категория</th>
            <th scope="col">Описание</th>
            <th scope="col">Картинка</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->description  }}</td>
                <td><img src="{{ $product->href }}" height=120 width=120></td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <button class="btn btn-primary btn-sm">Просмотреть</button>
                    </a>
                    @guest
                    @else
                        @if(auth()->user()->email=="egorfortov@gmail.com")
{{--                            <li class="nav-link px-2"> Вы администратор: можете удалить товары!</li>--}}

                            <a href="{{ route('products.edit', $product->id) }}">
                                <button class="btn btn-info btn-sm">Изменить</button>
                            </a>
                        @endif
                    @endguest

                    @guest
                    @else
                        @if(auth()->user()->email=="egorfortov@gmail.com")
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @endif
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
