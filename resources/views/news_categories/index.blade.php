<!-- resources/views/news_categories/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>News Categories</title>
</head>
<body>
    <h1>News Categories</h1>
    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <p>Created by: {{ $category->user->name }}</p> <!-- Данные автора категории -->
        @foreach ($category->news as $news)
            <h3>{{ $news->name }} by {{ $news->user->name }}</h3>
            <p>{{ $news->message }}</p>
        @endforeach
    @endforeach
</body>
</html>
