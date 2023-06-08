@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Выберите действие</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-2" style="display:flex; gap: 10px;">
      <a href="{{ route('admin.kurator.edit', $kurator->id) }}"><button type="button" class="btn btn-warning">Изменить</button></a>
      <form action="{{ route('admin.kurator.delete', $kurator->id) }}" method="POST">
          @csrf
          @method('delete')
          <input type="submit" value="Удалить" class="btn btn-danger">
      </form>
      <a href="{{ route('admin.kurator.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </div>

    <div class="border rounded">
        <div class="p-3 mb-1 bg-light text-dark"><b>ID: </b>{{ $kurator->id }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Имя: </b>{{ $kurator->name }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Фамилия: </b>{{ $kurator->surname }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Роль: </b>{{ $kurator->role }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Факультет: </b>{{ $kurator->faculty }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Email: </b>{{ $kurator->email }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Пароль: </b>{{ $kurator->password }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Создан: </b>{{ $kurator->created_at }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Изменен: </b>{{ $kurator->updated_at }}</div>
    </div>
@endsection
