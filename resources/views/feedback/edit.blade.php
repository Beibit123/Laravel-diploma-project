@extends('layouts.app')

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Название: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Введите название" value="{{ $post->title }}">

        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Описание: </label>
            <textarea name="content" class="form-control" id="description" placeholder="Введите описание">{{ $post->content }}</textarea>
 
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Изображения: </label>
            <input type="text" name="image" class="form-control mb-3" id="photo" placeholder="Добавьте фото" value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection
