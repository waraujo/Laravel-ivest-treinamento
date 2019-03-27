<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Investindo</title>
        @yield('css-view')
        <link rel="stylesheet" href="{{asset('css/styleshet.css')}}">
        <link href="http://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>

    @include('templates.menu-lateral')
    <section id="view-conteudo">
        @yield('conteudo-view')
    </section>
        @yield('js-view')
    </body>
</html>