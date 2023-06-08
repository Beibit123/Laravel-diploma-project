@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список мероприятий</h1>
          </div>
        </div>
      </div>
    </div>
    <div style="display: flex; gap: 10px;">
      <a href="{{ route('admin.post.create') }}"><button type="button" class="btn btn-success mb-3">Добавить</button></a>
    </div>
    <div>
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th>Описание</th>
          <th>Организатор</th>
          <th>Время проведения</th>
          <th>Статус мероприятия</th>
          <th>Добавлен</th>
          <th>Изменен</th>
        </tr>
      
      @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('admin.post.show', $post->id) }}" >{{ $post->title }}</a></td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_by }}</td>
            <td>{{ $post->time_of_event }}</td>
            <td>{{ $post->event_status }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
          </tr>
      @endforeach
    </table>
  </div>
@endsection