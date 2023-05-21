<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facturation ADEO</title>

    <!-- All custom css files -->
    <link rel="stylesheet" href="{{ url("css/tiers.css") }}">
</head>
<body>
    <div class="text-center">
        <h1><i><u>Toutes nos factures disponibles</u></i></h1>

        
        <p>Nous vous proposons dès à présent de consulter les factures par tiers,<br>
        vous aurais donc acces a toutes les factures des tiers ainsi qu'au montant total des factures par tiers<br>
        
        <h3> Voici la liste de l'ensemble de nos tiers</h3>
        
        @foreach($filtredInvoices as $invoice)
            <li>{{ $invoice["socid"] }}</li>
        @endforeach 

        <p class="deco">
            <a href="{{ route("logout") }}">
            <button>Déconnexion </button>
            </a>
        <p class="previous">
            <a href="{{ route("panel_invoices_get") }}">
            <button>précedent </button>
            </a>
        
    </div>
</body>
</html>
