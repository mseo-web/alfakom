@extends('layouts.front')
@section('title','Новости')
@section('content')
    <div class="container mt-5">
        <h1>Категория: {{ $category->name }}</h1>
        
        @if($category->news->isNotEmpty())
        <div class="b-example-divider"></div>
        <h2>Список новостей категории</h2>
            @foreach ($category->news as $single_news)
                <div class="card mb-4">
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
        @else
        <div class="fw-semibold fst-italic text-info fs-3 mt-3">В этой категории пока нет новостей.</div>
        @endif
    </div>

@endsection
