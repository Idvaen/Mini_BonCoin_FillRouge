<?php

if (!isset($id_cat)) {
    throw new Exception("Identifiant de category non valide");
}

// Déterminer le titre selon la catégorie
switch ($id_cat) {
    case 4:
        $this->titre = "Autres";
        break;
    case 3:
        $this->titre = "Électronique";
        break;
    case 2:
        $this->titre = "Mode";
        break;
    case 1:
        $this->titre = "Véhicules";
        break;
    default:
        throw new Exception("Identifiant de category non valide");
}
?>

<?php foreach ($annonces ?? [] as $annonce):
    ?>
    <article id="annonce">
        <a href="index.php?action=annonce&id=<?= $annonce['id'] ?>">
            <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
            <img src="../public/uploads/<?= in_array($annonce['photo'], $uploads) ? $annonce['photo'] : 'canape_test.jfif' ?>"
                alt="Photo de l'annonce <?= $annonce['photo'] ?>" class="imageAnnonce" />
        </a><br>
        <time>Date: <?= $annonce['date'] ?></time>
        <br>
        <p>Description: <?= $annonce['description'] ?></p>
        <p>Prix: <?= $annonce['prix'] ?>$</p>
        <p><a href="index.php?action=profil&id=<?= $annonce['Id_Utilisateur'] ?>">Auteur:
                <?= $annonce['pseudo'] ?>
            </a></p>
    </article>
    <hr />
<?php endforeach; ?>