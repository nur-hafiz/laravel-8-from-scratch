@props(['posts'])
@if ($posts->count())
    <x-featured-post-card :post="$posts->first()"></x-featured-post-card>

    @if ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$post" 
                class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}">
                </x-post-card>
            @endforeach
        </div>
    @endif
@else
    <p class="text-center">No posts found</p>
@endif
