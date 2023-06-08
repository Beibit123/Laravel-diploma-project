@extends('layouts.app')

@section('content')
    <div>
        {{ $posts->links() }}
    </div>
    <div>
        @foreach ($posts as $post)
            <div style="display:flex;">
                <img class="img-fluid" style="margin-right:20px;" width="30%" src="{{ url('storage/' . $post->preview_image) }}">
                <article>
                <h2>{{ $post->id }}. {{ $post->title }}</h2>
                
                <p>
                    {{ $post->content }}
                    <br>
                    <br>
                    <button type="button" class="btn btn-success"><a style="text-decoration: none; color: white;" href="{{ route('post.show', $post->id) }}" >Подробнее</a></button>
                </p>
                </article>
            </div>
            <br>
        @endforeach
    </div>
</div>
       
@endsection

