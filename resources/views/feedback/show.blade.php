@extends('layouts.app')

@section('content')
    <div>
        <div><h2>{{ $post->id }}. {{ $post->title }}</h2></div>
        <img href="" style="margin-right:20px;" width="20%" src="https://www.adobe.com/express/create/media_127a4cd0c28c2753638768caf8967503d38d01e4c.jpeg?width=400&format=jpeg&optimize=medium" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
        <div>{{ $post->content }}</div>
        
    </div>
    @guest
        @if (Route::has('login'))
            
        @endif
    @else
        <div style="display:flex; gap: 10px;">
            <a href="{{ route('post.edit', $post->id) }}"><button type="button" class="btn btn-warning">Изменить</button></a>
            <form action="{{ route('post.delete', $post->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Удалить" class="btn btn-danger">
            </form>
        
    @endguest

    <a href="{{ route('post.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </div>
    
@endsection
