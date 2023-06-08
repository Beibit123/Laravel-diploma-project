@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список пользователей</h1>
          </div>
        </div>
      </div>
    </div>
    <div>
        <a href="{{ route('admin.kurator.create') }}"><button type="button" class="btn btn-success mb-3">Добавить</button></a>
    </div>
    <div>
        <table class="table table-hover">
          <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Роль</th>
            <th>Факультет</th>
            <th>Emali</th>
            <th>Создан</th>
          </tr>
        
        @foreach ($kurators as $kurator)
            <tr>
              <td>{{ $kurator->id }}</td>
              <td><a href="{{ route('admin.kurator.show', $kurator->id) }}" >{{ $kurator->name }}</a></td>
              <td>{{ $kurator->surname }}</td>
              <td>{{ $kurator->role }}</td>
              <td>{{ $kurator->faculty }}</td>
              <td>{{ $kurator->email }}</td>
              <td>{{ $kurator->created_at }}</td>
            </tr>
        @endforeach
      </table>
    </div>
@endsection