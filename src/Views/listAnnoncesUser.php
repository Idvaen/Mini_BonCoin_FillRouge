<!-- Pour afficher les annonces de ce utilisateur -->
<?php foreach($user ?? [] as $u): ?>
    <?php $user = $u; break; 
    endforeach;  ?>

<?php $this->titre = "List d'annonces de " . $user['pseudo']; ?>

<?php
foreach ($annonces ?? [] as $index => $annonce):
    ?>
    <article id="annonce">
        <p>Catégorie: <?= $annonce['nom_category'] ?></p>
        <a href="index.php?action=annonce&id=<?= $annonce['id'] ?>">
            <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
            <img src="../public/uploads/<?= in_array($annonce['photo'], $uploads) ? $annonce['photo'] : 'canape_test.jfif' ?>"
                alt="Photo de l'annonce <?= $annonce['photo'] ?>" class="imageAnnonce" />
        </a><br>
        <time>Date: <?= $annonce['date'] ?></time>
        <p>Description: <?= $annonce['description'] ?></p>
        <p>Prix: <?= $annonce['prix'] ?>$</p>
        <?php //Afficher le button de suppression si l'utilisateur est le propriétaire de l'annonce
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $annonce['Id_Utilisateur']): ?>
            <form method="post" action="index.php?action=deleteAnnonce&id=<?= $annonce['id'] ?>"
                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                <button type="submit" class="btn btn-danger">Supprimer l'annonce</button>
            </form>
        <?php endif; ?>
    </article>
    <hr />
<?php
endforeach;
?>