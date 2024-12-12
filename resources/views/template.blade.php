<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
<div class="header">
    <ul>
        @section('navigation')
            <li><a href="#">Главная</a></li>
            <li><a href="#">Блог</a></li>
            @yield_section
    </ul>
</div>

@yield('content')

</body>
</html>
