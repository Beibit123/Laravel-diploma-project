@extends('layouts.app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Измените мероприятие</h1>
          </div>
        </div>
      </div>
    </div>
    <form action="{{ route('kurator.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label"><b>Сменить название: <b></label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Введите название" value={{ $post->title }}>

      </div>
      <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label"><b>Сменить описание: <b></label>
          <textarea name="content" class="form-control" id="description" placeholder="Введите описание" >{{ $post->content }}</textarea>

      </div>
      
      <div class="form-group row">
        <input type="hidden" name="created_by" value="{{ Auth::user()->name . " " . Auth::user()->surname }}">
      </div>

      <div class="form-group row">
        <label class="col col-form-label"><b>Поменять время проведения:<b></label>
        <input type="datetime-local" name="time_of_event" class="form-control" value="{{ $post->time_of_event }}">
      </div>

      <div class="form-group row">
        <label class="col col-form-label"><b>Поменять статус мероприятия:<b></label>
        <select name="event_status" class="form-control">
          @if ($post->event_status === "Запланирован")
            <option value="Запланирован">Запланирован</option>
            <option value="Проведен">Проведен</option>
            <option value="Отменен">Отменен</option>
          @elseif ($post->event_status === "Проведен")
            <option value="Проведен">Проведен</option>
            <option value="Запланирован">Запланирован</option>
            <option value="Отменен">Отменен</option>
          @else
            <option value="Отменен">Отменен</option>
            <option value="Проведен">Проведен</option>
            <option value="Запланирован">Запланирован</option>
          @endif
        </select>
      </div>

      <div class="form-group">
        <label class="col col-form-label"><b>Поменять превью: <b></label>
      </div>
      <div class="form-group">
        <img class="img-thumbnail w-40 mb-2" src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image">
        <input type="file" name="preview_image" class="form-control">
      </div>
      <div class="form-group">
        <label class="col col-form-label"><b>Поменять главное изображение: <b></label>
      </div>
      <div class="form-group">
        <img class="img-thumbnail w-40 mb-2" src="{{ url('storage/' . $post->main_image) }}" alt="main_image">
        <input type="file" name="main_image" class="form-control mb-3">
      </div>
      <div class="form-group mb-2">
        <button type="submit" class="btn btn-success">Изменить</button>
        <a href="{{ route('kurator.post.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
      </div>
    </form>
@endsection
