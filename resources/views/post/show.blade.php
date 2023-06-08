@extends('layouts.app')

@section('content')
    <a href="{{ route('post.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>  
    <div class="mt-3">
        <h2>{{ $post->id }}. {{ $post->title }}</h2>
    </div>
    
    <div style="display:flex;">
        
        <img href="" style="margin-right:20px;" width="40%" src="{{ url('storage/' . $post->main_image) }}"> 
        <div class="border rounded">
            <div class="p-3 mb-1 bg-light text-dark"><b>Название: </b>{{ $post->title }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Описание: </b>{{ $post->content}}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Организатор: </b>{{ $post->created_by }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Время проведения: </b>{{ $post->time_of_event }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Статус мероприятия: </b>{{ $post->event_status }}</div>
        </div>
    
    </div>
    
@endsection
