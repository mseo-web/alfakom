<ul>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('news.category', $category->id) }}">{{ $category->name }} (Автор: {{ $category->user->name }})</a>
            @if ($category->children->isNotEmpty())
                @include('components.category', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>
