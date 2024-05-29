<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">DFA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('categories')}}">Категории</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('dishes')}}">Список блюд</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Тип блюда
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="category/1">Завтраки</a></li>
              <li><a class="dropdown-item" href="category/2">Обеды</a></li>
              <li><a class="dropdown-item" href="category/3">Ужины</a></li>
              <li><a class="dropdown-item" href="category/4">Десерты</a></li>
							<li><a class="dropdown-item" href="category/5">Закуски</a></li>
            </ul>
          </li>
        </ul>

        @guest
          <a class="btn btn-outline-primary" href="{{url('auth')}}">Войти</a>
          @error('error')
            <div class="is-invalid">{{$message}}</div>
          @enderror
        @endguest

        @auth
          <a class="btn btn-outline-primary" href="{{url('logout')}}">Выйти</a>
        @endauth
      </div>
    </div>
  </nav>
</header>