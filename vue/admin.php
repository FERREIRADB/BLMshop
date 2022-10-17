<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Document</title>
</head>


<body>
    <h1>Admin</h1>
    <div class="produits">
        <table id="customers" style="margin-left: 25px; border-collapse: collapse;">
            <tr style="margin: 10px;">
                <th>Name</th>
                <th>Price</th>
                <th>Puissance</th>
                <th>Couple</th>
                <th>Moteur</th>
                <th>Consomation en Ville</th>
                <th>Consomation sur autoroute</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                
            </tr>
            <?php afficherArticle($produits); ?>
        </table>
    </div>

</body>

</html>