<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="public/assets/css/normalize.css" />
    <link rel="stylesheet" href="public/assets/css/style.css" />
    <title><?= $titre ?></title>
    <title>Gabarit</title>
</head>

<body>
    <div id="global">
        <header>
            <a href="index.php">
                <h1 id="titrePrincipal">Mini Bon Coin</h1>
            </a>
            <p>Je vous souhaite la bienvenue sur ce site.</p>
        </header>
        <div id="contenu">
            <?= $contenu ?>
        </div> <!-- #contenu -->
        <footer id="piedPrincipal">
            Projet réalisé avec PHP, HTML5 et CSS @2025.
        </footer>
    </div> <!-- #global -->
</body>

</html>