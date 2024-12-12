
@layout('template')

@section('title')
    Домашняя страничка Дейла.
@endsection

@section('navigation')
    @parent
    <li><a href="#">Обо мне</a></li>
@endsection

@section('content')
    <h1>Привет!</h1>
    <p>Добро пожаловать на мою домашнюю страничку!</p>
@endsection
