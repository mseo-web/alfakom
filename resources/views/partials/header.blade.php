<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <div class="logo mr-auto">
                <img src="{{ asset('assets/img/SM-logo2.png') }}" class="img-fluid" alt="" />
            </div>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{url('/')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="{{url('/news')}}" class="nav-link {{ request()->is('news') ? 'active' : '' }}">Новости</a></li>
            <li class="nav-item"><a href="{{url('/questions')}}" class="nav-link {{ request()->is('questions') ? 'active' : '' }}">Вопросы</a></li>
            <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Контакты</a></li>
        </ul>
    </header>
</div>