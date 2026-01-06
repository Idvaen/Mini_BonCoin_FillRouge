<?php $this->titre = "Details"; ?>

<article id="annonce">
    <a href="index.php?action=annonce&id=<?= $annonce['id'] ?>">
        <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
        <img src="../public/uploads/<?= in_array($annonce['photo'], $uploads) ? $annonce['photo'] : 'canape_test.jfif' ?>"
            alt="Photo de l'annonce <?= $annonce['photo'] ?>" class="imageAnnonce" />
    </a><br>
    <time>Date: <?= $annonce['date'] ?></time>
    <br>
    <p>Category: <?= $annonce['nom_category'] ?></p>
    <p>Description: <?= $annonce['description'] ?></p>
    <p>Prix: <?= $annonce['prix'] ?>$</p>
    <p>Contact: <?= $annonce['pseudo'] ?></p>
</article>
<hr />