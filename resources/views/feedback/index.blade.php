@extends('layouts.app')

@section('content')
    <div>
        @foreach ($feedbacks as $feedback)
            <div style="display:flex;">
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
