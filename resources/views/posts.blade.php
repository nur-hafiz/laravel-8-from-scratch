<x-layout>
    @foreach ($posts as $post)
        <article class={{ $loop->even ? 'isEven' : ''}}>
            <h1>
                <a href='/posts/{{ $post->slug }}'>
                    {!! $post->title !!}
                </a>
            </h1>

            <p>
                By <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            </p>
    
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>
