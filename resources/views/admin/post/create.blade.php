@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Создайте мероприятие</h1>
          </div>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Введите название: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Введите название">

        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Введите описание: </label>
            <textarea name="content" class="form-control" id="description" placeholder="Введите описание"></textarea>
 
        </div>
        
        <div class="form-group row">
          <label class="col col-form-label">Организатор: </label>
          <select name="created_by" class="form-control">
            @foreach ($users as $user)
              @if ($user->role === "kurator")
                <option value="{{ $user->name }} {{ $user->surname }}">{{ $user->name }} {{ $user->surname }}</option>
              @endif
            @endforeach
          </select>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Время проведения:</label>
          <input type="datetime-local" name="time_of_event" class="form-control">
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Статус мероприятия:</label>
          <select name="event_status" class="form-control">
            <option value="Запланирован">Запланирован</option>
            <option value="Проведен">Проведен</option>
            <option value="Отменен">Отменен</option>
          </select>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Добавьте превью: </label>
          <input type="file" name="preview_image" class="form-control">
        </div>

        <div class="form-group row">
          <label class="col col-form-label">Добавьте главное изображение: </label>
          <input type="file" name="main_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Добавить</button>
        <a href="{{ route('admin.post.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </form>
@endsection