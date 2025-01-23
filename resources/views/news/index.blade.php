@extends('layouts.front')
@section('title','Новости')
@section('content')

    <div class="container mt-5">
        <h1>Категории</h1>
        @include('components.category', ['categories' => $categories])

        <div class="b-example-divider"></div>

        <h1 class="mt-3">Список новостей</h1>
        @foreach ($news as $single_news)
            <div class="card mb-4">
                @if ($single_news->images)
                <img src="{{ asset('storage/' . $single_news->images[0]) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-header">
                    <h2><a href="{{ route('news.show', $single_news->id) }}">{{ $single_news->name }}</a></h2>
                    <p>Автор: {{ $single_news->user->name }}</p>
                    <p>Опубликовано: {{ $single_news->event_date }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $single_news->message !!}</p>
                    <hr>
                    <h5>Категории:</h5>
                    <ul>
                        @foreach ($single_news->categories as $category)
                            <li>{{ $category->name }} (Автор: {{ $category->user->name }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

@endsection
