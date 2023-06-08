@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать куратора</h1>
          </div>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.kurator.update', $kurator->id) }}" method="POST">
      @csrf
      @method('patch')
      <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Введите имя: </label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя" value="{{ $kurator->name }}">
      </div>
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Введите фамилию: </label>
        <input type="text" name="surname" class="form-control" id="name" placeholder="Введите фамилию" value="{{ $kurator->surname }}">
      </div>
      <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label">Добавьте роль: </label>
        <select name="role" class="form-control">
          @if ($kurator->role === "admin")
            <option value="admin">Администратор</option>
            <option value="kurator">Куратор</option>
          @elseif ($kurator->role === "kurator")
            <option value="kurator">Куратор</option>
            <option value="admin">Администратор</option>
          @endif
          
        </select>
      </div>
      <div class="form-group row">
        <label for="photo" class="col col-form-label">Добавьте факультет куратора: </label>
        <select name="faculty" class="form-control">
          <option value="engineering">Факультет инжиниринга и информационных технологий</option>
          <option value="food">Факультет пищевых технологий</option>
          <option value="design">Факультет дизайна, технологий текстиля и одежды</option>
          <option value="economy">Факультет экономики и бизнеса</option>
          <option value="switzerland">Казахстанско Швейцарский институт</option>
        </select>
      </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Введите Email: </label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Введите почту" value="{{ $kurator->email }}"">
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Введите пароль: </label>
            <input type="text" name="password" class="form-control" id="photo" placeholder="Введите пароль" value="{{ $kurator->password }}"">
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
        <a href="{{ route('admin.kurator.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
    </form>
@endsection
