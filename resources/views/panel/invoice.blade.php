<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facturation ADEO</title>

    <!-- All custom css files -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="text-center">
        <h1><i><u>Toutes nos factures disponibles</u></i></h1>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Note publique</td>
                    <td>Prix Depart</td>
                    <td>TVA</td>
                    <td>Remise en %</td>
                    <td>Prix facture</td>
                    <td>Statut de la facture</td>
                </tr>
            </thead>
        </table>

        <br>Bonjour {{ auth()->user()->name }}, pour vous déconecter cliqué sur le bouton
            <a href="{{ route("logout") }}">
        <button>Déconnexion </button>
            </a>
    </div>
</body>
</html>