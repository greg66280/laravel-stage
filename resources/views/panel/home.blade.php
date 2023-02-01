<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url("css/home.css") }}">
    <title>Page de garde</title>
</head>
<body>
<header>
     <h1><strong><i><u>Site de facturation Dolibarr</u></i></strong></h1>
</header>
<main>
    
        <img src="{{ url("img/facturation.png") }}" alt="IMG">
    
    <div>
        <p>
                <strong>Gérez vos Factures où que vous soyez grâce à l'application dolibou.<br>
                <br> Accélérez vos factures grâce à<br>
                <br>une meilleure gestion de vos achats / ventes ,
                <br>de vos description,
                <br>des prix de factuation, 
                <br>et du status de vos factures</strong>
        </p>
    </div>
</main>

<footer>
    <p class="factures">
        <a href="{{ route("panel_invoices_get") }}">
            <button>Vers factures</button>
        </a>
    </p>
    <p class="deco">
        <a href="{{ route("logout") }}">
            <button>Déconnexion </button>
        </a>
    </p> 
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
</footer>
</body>
</html>

