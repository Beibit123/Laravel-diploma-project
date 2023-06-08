@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Отзывы</h1>
          </div>
        </div>
      </div>
    </div>
    <div>
      <a href="{{ route('admin.feedback.create') }}"><button type="button" class="btn btn-success mb-3">Добавить</button></a>
    </div>
    <div>
        <table class="table table-hover">
          <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Emali</th>
            <th>Комментарий</th>
            <th>Создан</th>
            <th>Изменен</th>
          </tr>
        
        @foreach ($feedbacks as $feedback)
            <tr>
              <td>{{ $feedback->id }}</td>
              <td><a href="{{ route('admin.feedback.show', $feedback->id) }}" >{{ $feedback->username }}</a></td>
              <td>{{ $feedback->email }}</td>
              <td>{{ $feedback->message }}</td>
              <td>{{ $feedback->created_at }}</td>
              <td>{{ $feedback->updated_at }}</td>
            </tr>
        @endforeach
      </table>
    </div>
@endsection

