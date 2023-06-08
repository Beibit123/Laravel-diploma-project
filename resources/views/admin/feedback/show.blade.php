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
        <a href="{{ route('admin.feedback.edit', $feedback->id) }}"><button type="button" class="btn btn-warning">Изменить</button></a>
        <form action="{{ route('admin.feedback.delete', $feedback->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger">
        </form>
        <a href="{{ route('admin.feedback.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </div>

    <div class="border rounded">
        <div class="p-3 mb-1 bg-light text-dark"><b>ID: </b>{{ $feedback->id }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Имя: </b>{{ $feedback->username }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Email: </b>{{ $feedback->email }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Комментарий: </b>{{ $feedback->message }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Создан: </b>{{ $feedback->created_at }}</div>
        <div class="p-3 mb-1 bg-light text-dark"><b>Изменен: </b>{{ $feedback->updated_at }}</div>
    </div>
@endsection
