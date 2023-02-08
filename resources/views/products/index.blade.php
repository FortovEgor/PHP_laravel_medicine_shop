@extends('layouts.app')

@section('title', 'Карточка товара')

@section('content')
    <button class="btn btn-success">Создать товар</button>
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
                        @if(auth()->user()->email="egorfortov@gmail.com")
{{--                            <li class="nav-link px-2"> Вы администратор: можете удалить товары!</li>--}}

                            <a href="{{ route('products.edit', $product->id) }}">
                                <button class="btn btn-info btn-sm">Изменить</button>
                            </a>
                        @endif
                    @endguest

                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm">Удалить</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
