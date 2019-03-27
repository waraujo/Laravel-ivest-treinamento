<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login | Investindo</title>
        <link rel="stylesheet" href="{{asset('css/styleshet.css')}}">
        <link href="http://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    </head>

    <body>
        <div class="background"></div>
        <section id="conteudo-view" class="login">
            <h1>Investindo</h1>
            <h3>O nosso gerenciador de investimentos</h3>
            {!! Form::open(['route'=>'user.login','method'=>'post']) !!}
                <p>Acesse nosso sistema</p>

                <label>
                    {!! Form::text('username', null,['class'=> 'input','placeholder'=>'Usuário']) !!}
                </label>
                <label>
                    {!! Form::password('password',['placeholder'=>'password']) !!}
                </label>
                {!! Form::submit('Entrar') !!}

            {!!Form::close() !!}
        </section>
    </body>
</html>