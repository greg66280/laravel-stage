<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscription | Adeo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{{ url("vendor/bootstrap/css/bootstrap.min.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ url("fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ url("vendor/animate/animate.css") }}">	
	<link rel="stylesheet" type="text/css" href="{{ url("vendor/css-hamburgers/hamburgers.min.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ url("vendor/select2/select2.min.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ url("css/util.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ url("css/main.css") }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ url("img/logo_adeo.png") }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{ route("register_post") }}" method="POST">
					<span class="login100-form-title">
						Inscription | Adeo
					</span>
					@csrf <!-- Faille XSRF -->
					@method("POST")
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" placeholder="Nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="confpassword" placeholder="Confirmer le mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Connexion
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route("login_get") }}">
							Se connecter
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

		
	<script src="{{ url("vendor/jquery/jquery-3.2.1.min.js") }}"></script>
	<script src="{{ url("vendor/bootstrap/js/popper.js") }}"></script>
	<script src="{{ url("vendor/bootstrap/js/bootstrap.min.js") }}"></script>
	<script src="{{ url("vendor/select2/select2.min.js") }}"></script>
	<script src="{{ url("vendor/tilt/tilt.jquery.min.js") }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
		let notyf = new Notyf({
			position: {
				x: 'right',
				y: 'top'
			}
		});
	</script>
	@foreach ($errors->all() as $error)
		<script>
			notyf.error('{{ $error }}')
		</script>
	@endforeach
	@if(session("error"))
		<script>
			notyf.error('{{ session("error") }}')
		</script>
	@endif
	@if(session("success"))
		<script>
			notyf.success('{{ session("success") }}')
		</script>
	@endif
</body>
</html>