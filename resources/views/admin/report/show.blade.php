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
      <div class="col-sm-6">
        <a href="{{ route('admin.report.index') }}"><button type="button" class="btn btn-secondary">Назад</button></a>
      </div>
      <div class="col-sm-6">
        <form action="{{ route('admin.report.show', $kurator->id) }}" method="get" class="float-right">
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
            <button type="submit" class="btn btn-info">Фильтровать</button>
          </div>
        </form>
      </div>
    </div>
    <h3 class="m-2">{{ $date }}</h3>
    <div>
      <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Мероприятия</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Куратор</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Статистика</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-content-above-settings-tab" data-toggle="pill" href="#custom-content-above-settings" role="tab" aria-controls="custom-content-above-settings" aria-selected="false">Отчеты</a>
        </li>
      </ul>
      <div class="tab-content" id="custom-content-above-tabContent">
        <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
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
        <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
          <div class="border rounded">
            <div class="p-3 mb-1 bg-light text-dark"><b>ID: </b>{{ $kurator->id }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Имя: </b>{{ $kurator->name }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Фамилия: </b>{{ $kurator->surname }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Роль: </b>{{ $kurator->role }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Факультет: </b>{{ $kurator->faculty }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Email: </b>{{ $kurator->email }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Создан: </b>{{ $kurator->created_at }}</div>
            <div class="p-3 mb-1 bg-light text-dark"><b>Изменен: </b>{{ $kurator->updated_at }}</div>
          </div>
        </div>
        <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
         <div class="row mt-3">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $planned_events }}</h3>
                <p>Запланировано</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $made_events }}</h3>

                  <p>Проведено</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $cancelled_events }}</h3>
                  <p>Отменено</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $planned_percentage }}<sup style="font-size: 20px">%</sup> / {{ $made_percentage }}<sup style="font-size: 20px">%</sup> / {{ $cancelled_percentage }}<sup style="font-size: 20px">%</sup></h3>
  
                  <p>З / П / О</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-pie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="custom-content-above-settings" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
          <div class="row">
            <div class="col-12">
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Примечание:</h5>
                Эта страница была сгенерирована для печати. Нажмите скачать в PDF в нижней части документа
              </div>
  
  
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Almaty Technological University
                      <small class="float-right">Дата: {{ $date_today }}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <strong>Администратор</strong>
                    <address>
                      {{ Auth::user()->name . " " . Auth::user()->surname }}<br>
                      <strong>Номер администратора: </strong> {{ Auth::user()->id }}<br>
                      Email: info@almasaeedstudio.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <strong>Куратор</strong>
                    <address>
                      {{ $kurator->name . " " . $kurator->surname }}<br>
                      <strong>Номер куратора:</strong> {{ $kurator->id }}<br>
                      Email: {{ $kurator->email }}
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Отчет за:</b> {{ $date }}<br>
                    <b>Период:</b> {{ $exact_date }}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <p class="lead">Мероприятия за указаный период:</p>
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Номер</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Время проведения</th>
                        <th>Статус мероприятия</th>
                        <th>Создан</th>
                        <th>Изменен</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->time_of_event}}</td>
                            <td>{{$post->event_status}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Гистограмма прогресса</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="progress">
                          <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $planned_percentage }}%">
                            <span class="sr-only">40% Complete (success)</span>
                          </div>
                        </div>
                        <p><code>Запланировано</code></p>
        
                        <div class="progress progress-sm active">
                          <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ $made_percentage }}%">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                        <p><code>Проведено</code></p>
        
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $cancelled_percentage }}%">
                            <span class="sr-only">60% Complete (warning)</span>
                          </div>
                        </div>
                        <p><code>Отменено</code></p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <p class="lead">Статистика куратора</p>
  
                    <div class="table-responsive">
                      <table class="table">
                        <tbody><tr>
                          <th style="width:50%">Запланировано мероприятий:</th>
                          <td>{{ $planned_events }}</td>
                        </tr>
                        <tr>
                          <th>Проведено мероприятий</th>
                          <td>{{ $made_events }}</td>
                        </tr>
                        <tr>
                          <th>Отменено мероприятий</th>
                          <td>{{ $cancelled_events }}</td>
                        </tr>
                        <tr>
                          <th>(З / П / О)</th>
                          <td>{{ $planned_percentage }}% / {{ $made_percentage }}% / {{ $cancelled_percentage }}%</td>
                        </tr>
                        <tr>
                          <th>Результат</th>
                          <td>
                            @if ($planned_percentage + $made_percentage - $cancelled_percentage > 75)
                              Отлично <i class="icon fas fa-check"></i>
                            @elseif ($planned_percentage + $made_percentage - $cancelled_percentage > 50)
                              Хорошо <i class="icon fas fa-info"></i>
                            @else
                              Плохо <i class="icon fas fa-exclamation-triangle"></i>
                            @endif
                          </td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Печать</a>
                    <form action="{{ route('admin.report.pdf', $kurator->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="planned_events" value="{{ $planned_events }}">
                      <input type="hidden" name="made_events" value="{{ $made_events }}">
                      <input type="hidden" name="cancelled_events" value="{{ $cancelled_events }}">
                      <input type="hidden" name="date" value="{{ $date }}">
                      <input type="hidden" name="planned_percentage" value="{{ $planned_percentage }}">
                      <input type="hidden" name="cancelled_percentage" value="{{ $cancelled_percentage }}">
                      <input type="hidden" name="made_percentage" value="{{ $made_percentage }}">
                      <input type="hidden" name="date_today" value="{{ $date_today }}">
                      <input type="hidden" name="exact_date" value="{{ $exact_date }}">
                      <button type="submit" class="btn btn-primary float-right">Генерировать PDF</button>
                    </form>

                      
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div>
        </div>
      </div>
    </div>
@endsection
