<?php $this->titre = "Mini Bon Coin"; ?>

<?php
foreach ($annonces ?? [] as $index => $annonce):
    ?>
    <article id="annonce">
        <a href="index.php?action=annonce&id=<?= $annonce['Id_ANNONCE'] ?>">
            <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
            <img src="../public/uploads/<?= in_array($annonce['photo'], $uploads) ? $annonce['photo'] : 'canape_test.jfif' ?>"
                alt="Photo de l'annonce <?= $annonce['photo'] ?>" class="imageAnnonce" />
        </a><br>
        <time>Date: <?= $annonce['date_public'] ?></time>
        <br>
        <p>Description: <?= $annonce['description'] ?></p>
        <p>Prix: <?= $annonce['prix'] ?>$</p>
    </article>
    <hr />
    <?php
    if ($index == 7) {
        break;
    }
endforeach;
?>