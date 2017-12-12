<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>AutómataPucpSystem | </title>
    
    <link href="{{ asset("css/app.min.css") }}" rel="stylesheet">
<!--     <style type="text/css">
        .login{
            background: url("images/auto.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style> -->
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                {!! BootForm::open(['url' => url('/login'), 'method' => 'post']) !!}
                    
                <h1>Login</h1>
            
                {!! BootForm::email('email', 'Email', old('email'), ['placeholder' => 'Email', 'afterInput' => '<span>test</span>'] ) !!}
            
                {!! BootForm::password('password', 'Password', ['placeholder' => 'Password']) !!}
                
                <div>
                    {!! BootForm::submit('Entrar', ['class' => 'btn btn-default submit']) !!}
                    <a class="reset_pass" href="{{  url('/password/reset') }}">Olvidaste tu contraseña ?</a>
                </div>
                    
                <div class="clearfix"></div>
                    
                <div class="separator">
                    <!-- <p class="change_link">No tienes cuenta?
                        <a href="{{ url('/register') }}" class="to_register"> Crear una cuenta </a>
                    </p> -->
                        
                    <div class="clearfix"></div>
                    <br />
                        
                    <div>
                        <h1><i class="fa fa-bus"></i> Autómata Pucp</h1>
                        <p>©2017 Todos los derechos reservados. AutómataPucp System fue construido por el grupo AutómataPucp. Privacy and Terms</p>
                    </div>
                </div>
                {!! BootForm::close() !!}
            </section>
        </div>
    </div>
</div>
<script src="{{ asset("js/app.min.js") }}"></script>
</body>
</html>
