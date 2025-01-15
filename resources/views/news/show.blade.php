@extends('layouts.front')
@section('title','Новости')
@section('content')

    <div class="container mt-5">
        <h1>{{ $news->name }}</h1>
        <p>Автор: {{ $news->user->name }}</p>
        <p>Опубликовано: {{ $news->event_date }}</p>
        <p>{!! $news->message !!}</p>

        <h5>Категории:</h5>
        <ul>
            @foreach ($news->categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>

@endsection
