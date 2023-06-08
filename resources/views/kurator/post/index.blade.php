@extends('layouts.app')

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
      <div class="col-sm-6">
        <a href="{{ route('kurator.post.create') }}"><button type="button" class="btn btn-success mb-3">Добавить</button></a>
      </div>
      <div class="col-sm-6">
        <form action="{{ route('kurator.post.index') }}" method="get" class="float-right">
          <label>Фильтровать по дате:</label>
          <div class="input-group">
            <select class="form-select" name="date_filter">
              <option value="all_the_time">За все время</option>
              <option value="today">Сегодня</option>
              <option value="yesterday">Вчера</option>
              <option value="this_week">За эту неделю</option>
              <option value="last_week">За прошлую неделю</option>
              <option value="this_month">За этот месяц</option>
              <option value="last_month">За прошлый месяц</option>
              <option value="this_year">За этот год</option>
              <option value="last_year">За прошлый год</option>
            </select>
            <input type="hidden" name="kurator" value="{{ Auth::user()->name }} {{Auth::user()->surname}}">
            <button type="submit" class="btn btn-info">Фильтровать</button>
          </div>
        </form>
      </div>
    </div>
    <h3 class="m-2">{{ $date }}</h3>
    <div>
      <table class="table table-bordered mt-3">
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
        @if ($post->created_by == Auth::user()->name . " " . Auth::user()->surname)
          <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('kurator.post.show', $post->id) }}" >{{ $post->title }}</a></td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_by }}</td>
            <td>{{ $post->time_of_event }}</td>
            <td>{{ $post->event_status }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
          </tr>
        @endif
      @endforeach
    </table>
  </div>
@endsection