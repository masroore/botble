<div>
    <h3>{{ $category->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<div>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <article>
                <div>
                    <a href="{{ route('public.single', $post->slug) }}"><img src="{{ url($post->image) }}" alt="{{ $post->name }}"></a>
                </div>
                <div>
                    <header>
                        <h3><a href="{{ route('public.single', $post->slug) }}">{{ $post->name }}</a></h3>
                        <div><span><a href="#">{{ date_from_database($post->created_at, 'M d, Y') }}</a></span><a href="{{ route('public.author', $post->user->username) }}">{{ $post->user->getFullName() }}</a> - <a href="{{ route('public.single', $category->slug) }}">{{ $category->name }}</a></div>
                    </header>
                    <div>
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            </article>
        @endforeach
        <div>
            {!! $posts->links() !!}
        </div>
    @else
        <div>
            <p>{{ __('There is no data to display!') }}</p>
        </div>
    @endif
</div>