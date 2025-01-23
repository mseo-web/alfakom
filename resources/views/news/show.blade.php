@extends('layouts.front')
@section('title','Новости')
@section('content')

    <div class="container mt-5">

        @if ($news->images)
        <div class="p-3 border rounded">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($news->images as $image)
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Image">
                        </div>
                    @endforeach
                </div>
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
            </div>
        </div>
        @endif

        <h1 class="mt-3">{{ $news->name }}</h1>
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
