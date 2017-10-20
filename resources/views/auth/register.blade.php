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

</head>

<body class="login">
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
			{!! BootForm::open(['url' => url('/register'), 'method' => 'post']) !!}
			
			<h1>Create una cuenta</h1>

			{!! BootForm::text('name', 'Nombre', old('name'), ['placeholder' => 'Nombre completo']) !!}

			{!! BootForm::email('email', 'Email', old('email'), ['placeholder' => 'Email']) !!}

			{!! BootForm::password('password', 'Password', ['placeholder' => 'Password']) !!}

			{!! BootForm::password('password_confirmation', 'Confirma tu Password', ['placeholder' => 'Repite tu password']) !!}
		
			{!! BootForm::submit('Registrar', ['class' => 'btn btn-default']) !!}
		   
			<div class="clearfix"></div>
			
			<div class="separator">
				<p class="change_link">You tienes cuenta?
					<a href="{{ url('/login') }}" class="to_register"> Ingresa </a>
				</p>
				
				<div class="clearfix"></div>
				<br />
				
				<div>
					<h1><i class="fa fa-paw"></i> Autómata Pucp</h1>
					<p>©2017 All Rights Reserved. Autómata Pucp is a Bootstrap 3 template. Privacy and Terms</p>
				</div>
			</div>
			{!! BootForm::close() !!}
        </section>
    </div>
</div>
<script src="{{ asset("js/app.min.js") }}"></script>
</body>
</html>
