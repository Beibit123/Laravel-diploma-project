@extends('layouts.admin')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Выберите куратора</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="display: inline-flex">
        @foreach ($kurators as $kurator)
          <div class="card" class="col" style="margin: 15px; width:30%;">
            <div class="card-header">{{ $kurator->name . " " . $kurator->surname }}</div>
            <div class="card-body">
              <h5 class="card-title">Факультет: {{ $kurator->faculty }}</h5><br>
              <h5 class="card-title">Email: {{ $kurator->email }}</h5>
            </div>
            <div class="card-footer"><a href="{{ route('admin.report.show', $kurator->id) }}">Отчеты</a></div>
          </div>
        @endforeach
    </div>
@endsection