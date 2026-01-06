<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/assets/css/normalize.css" />
    <link rel="stylesheet" href="../public/assets/css/style.css" />
    <title><?= $titre ?></title>
    <title>Gabarit</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../public/uploads/logo.jpg" alt="logo" id="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Annonces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Login/Register
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <div id="global">
        <header id="gabarit_titre">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>