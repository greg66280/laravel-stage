<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <title>Page de garde</title>
</head>
<body>
    Salam {{ auth()->user()->name }}
    <a href="{{ route("logout") }}">
        <button>Déconnexion wola</button>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
		let notyf = new Notyf({
			position: {
				x: 'right',
				y: 'top'
			}
		});
	</script>
@if(session("success"))
    <script>
        notyf.success('{{ session("success") }}')
    </script>
@endif
</body>
</html>

