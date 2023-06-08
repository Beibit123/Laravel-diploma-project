<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">ВЫБЕРИТЕ КАТЕГОРИЮ</li>
      <li class="nav-item">
        <a href="{{ route('admin.post.index') }}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Мероприятия
            <span class="badge badge-info right"></span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.kurator.index') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Пользователи
            <span class="badge badge-info right"></span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.feedback.index') }}" class="nav-link">
          <i class="nav-icon far fa-envelope"></i>
          <p>
            Отзывы
            <span class="badge badge-info right"></span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.report.index') }}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>
            Отчеты
            <span class="badge badge-info right"></span>
          </p>
        </a>
      </li>
    </ul>
  </nav>