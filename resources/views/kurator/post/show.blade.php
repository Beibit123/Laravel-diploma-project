@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Мероприятие:</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-2" style="display:flex; gap: 10px;">
        <a href="{{ route('kurator.post.edit', $post->id) }}"><button type="button" class="btn btn-warning">Изменить</button></a>
        <form action="{{ route('kurator.post.delete', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger">
        </form>
        <a href="{{ route('kurator.post.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </div>

    <div class="border rounded">
      <div class="p-3 mb-1 bg-light text-dark"><b>ID: </b>{{ $post->id }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Название: </b>{{ $post->title }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Описание: </b>{{ $post->content}}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Организатор: </b>{{ $post->created_by }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Время проведения: </b>{{ $post->time_of_event }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Статус мероприятия: </b>{{ $post->event_status }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Создан: </b>{{ $post->created_at }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Изменен: </b>{{ $post->updated_at }}</div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Превью:</b></div>
      <div class="p-3 mb-1 bg-light text-dark"><img class="img-thumbnail" src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image"></div>
      <div class="p-3 mb-1 bg-light text-dark"><b>Главное изображение:</b></div>
      <div class="p-3 mb-1 bg-light text-dark"><img class="img-thumbnail" src="{{ url('storage/' . $post->main_image) }}" alt="main_image"></div>
  </div>
@endsection
