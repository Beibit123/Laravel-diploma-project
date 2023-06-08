@extends('layouts.app')

@section('content')
    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Ваше имя: </label>
            <input type="text" name="username" class="form-control" id="title" placeholder="Введите имя">

        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Электронная почта: </label>
            <input type="text" name="email" class="form-control" id="photo" placeholder="Введите адрес электронной почты">
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Комментарий: </label>
            <textarea name="message" class="form-control mb-3" id="description" placeholder="Добавьте комментарий"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
        <a href="{{ route('main') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </form>
@endsection
