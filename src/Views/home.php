<?php $this->titre = "Mini Bon Coin"; ?>

<?php foreach ($annonces as $annonce):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=annonce&id=" . $annonce['id'] ?>">
                <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
            </a>
            <time><?= $annonce['date_public'] ?></time>
        </header>
        <p><?= $annonce['description'] ?></p>
        <p><?= $annonce['prix'] ?>$</p>
    </article>
    <hr />
<?php endforeach; ?>