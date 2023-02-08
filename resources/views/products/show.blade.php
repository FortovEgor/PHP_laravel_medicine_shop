@extends('layouts.app')

@section('title', 'Товар')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p>Категория: {{ $product->category }}</p>
            <p>Цена: {{ $product->price }}</p>
            <p>Описание: {{ $product->description }}</p>
            <p>Автор товара: {{ $product->user->name }}</p>
            <img src="{{ $product->href }}" width="300" height="300">
{{--            <p>Пользователь: {{ $product->user->name }}</p>--}}

            <button class="btn btn-primary">Назад</button>
        </div>
    </div>
@endsection
