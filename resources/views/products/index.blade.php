@extends('layouts.app')

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
    <div><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Название товара" title="Type in a name" style="width: 500px; box-sizing: border-box;"></div>
    <div style="padding: 10px"></div>
    <script>
        function myFunction() {
            var input, filter, i, txtValue, tbody;
            input = document.getElementById("myInput");  // +
            filter = input.value.toUpperCase();  // +

            tbody = document.getElementById("tbody");
            tr = tbody.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                txtValue = tr[i].id;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function createShoppingCart() {
            alert("aaaaaaaaa");
        }
    </script>
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
        <tbody id="tbody">
        @foreach($products as $product)
            <tr id="{{ $product->name }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->description  }}</td>
                <td><img src="{{ $product->href }}" height=120 width=120></td>
                <td>{{ $product->price }}</td>
                <td>
{{--                    По--}}
{{--                    @can('product.show')--}}
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
{{--        <tbody>--}}
{{--        @foreach($users as $user)--}}
{{--            <h3>{{ $user->name }}</h3>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
    </table>
@endsection
