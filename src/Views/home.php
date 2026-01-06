<?php $titre = "Mini Bon Coin"; ?>

<?php foreach ($annonces ?? [] as $annonce):
    ?>
    <article id="annonce">
        <a href="index.php?action=annonce&id=<?= $annonce['Id_ANNONCE'] ?>">
            <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
        </a>
        <!-- <img src="< $annonce['photo'] ?>" alt="Photo de l'annonce < $annonce['photo'] ?>" class="imageAnnonce"/><br> -->
        <img src="../public/uploads/canape_test.jfif" alt="Photo de l'annonce canape_test.jfif" class="imageAnnonce" /><br>
        <time><?= $annonce['date_public'] ?></time>
        <p><?= $annonce['description'] ?></p>
        <p><?= $annonce['prix'] ?>$</p>
    </article>
    <hr />
<?php endforeach; ?>