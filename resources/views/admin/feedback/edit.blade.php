@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать отзыв</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.feedback.update', $feedback->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Введите имя: </label>
            <input type="text" name="username" class="form-control" id="title" placeholder="Введите имя" value="{{ $feedback->username }}">

        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Электронная почта: </label>
            <input type="text" name="email" class="form-control" id="photo" placeholder="Введите адрес электронной почты" value="{{ $feedback->email }}">
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Комментарий: </label>
            <textarea name="message" class="form-control mb-3" id="description" placeholder="Добавьте комментарий">{{ $feedback->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
        <a href="{{ route('admin.feedback.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </form>
@endsection
