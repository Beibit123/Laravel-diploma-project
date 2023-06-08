<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отчет</title>
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/business-1332/53/98-512.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }} ">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }} ">
    <!-- overlayScrollbars --> 
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }} ">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }} ">
    <style>
      body { 
        font-family: DejaVu Sans; 
      }
      
    </style>
  </head>
  <body>
      <div class="tab-pane fade" id="custom-content-above-settings" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
        <div class="row">
          <div class="col-12">
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
                  <table>
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

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div>
      </div>
      <!-- jQuery -->
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- ChartJS -->
      <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
      <!-- Sparkline -->
      <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
      <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
      <!-- daterangepicker -->
      <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
      <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
      <!-- Summernote -->
      <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
      <!-- overlayScrollbars -->
      <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('dist/js/adminlte.js') }}"></script>
      <!-- dropzonejs -->
      <script src="../../plugins/dropzone/min/dropzone.min.js"></script>
  </body>
</html>
