<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facturation ADEO</title>

    <!-- All custom css files -->
    <link rel="stylesheet" href="{{ url("css/style.css") }}">
</head>
<body>
    <div class="text-center">
        <h1><i><u>Toutes nos factures disponibles</u></i></h1>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Produit / Service</td>
                    <td>Description</td>
                    <td>Prix Unitaire</td>
                    <td>Quantité</td>
                    <td>Tva</td>
                    <td>Prix Total</td>
                    <td>Statut</td>
                    <td>Statut</td>
                </tr>
            </thead>

            <tbody>
                @foreach($filtredInvoices as $invoice)
                    <tr>
                        <td>{{ $invoice["id"] }}</td>
                        <td>{{ $invoice["lines"][0]["desc"] }}</td>
                        <td>{{ $invoice["note_public"] }}</td>
                        <td>{{ $invoice["lines"][0]["subprice"]*1 }}</td>
                        <td>{{ $invoice["lines"][0]["qty"] }}</td>
                        <td>{{ $invoice["total_tva"]*1 }}</td>
                        <td>{{ $invoice["total_ttc"]*1 }}</td>
                        <td>{{ $invoice["status"] }}</td>
                        
                        <td>
                            <form method="POST" action="">
                                @csrf
                                <div class='dropdown'>
                                    <button class='dropbtn'>status</button>
                                    <div class='dropdown-content'>
                                        <input type='hidden' name='id' value='id'>
                                        <button type='submit' name='draft'>Brouillon</a>
                                        <button type='submit' name='paid'>Payée</a>
                                        <button type='submit' name='unpaid'>Impayée</a>
                                    </div>
                                </div>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="deco">
            <a href="{{ route("logout") }}">
            <button>Déconnexion </button>
            </a>
        </p>
        <p class="previous">
            <a href="{{ route("panel_home_get") }}">
            <button>Précedent </button>
            </a>
        </p>
    </div>
</body>
</html>
