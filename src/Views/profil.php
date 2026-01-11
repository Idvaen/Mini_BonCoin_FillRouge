<?php $this->titre = "Profil"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container">
    <div class="portfolio-card card">
        <img src="../public/uploads/profile.png" class="card-img-top" alt="Profile Picture">
        <div class="card-body text-center">
            <h5 class="card-title"><?= $user['pseudo'] ?></h5>
            <p class="card-text text-muted">Web Developer</p>
            <p class="card-text">Passionate about creating beautiful and functional websites.</p>
            <div class="d-flex justify-content-center mb-3">
                <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="btn btn-outline-primary"><i class="fab fa-github"></i></a>
            </div>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><i class="fas fa-envelope me-2"></i><?= $user['email'] ?></li>
                <li class="list-group-item"><i class="fas fa-phone me-2"></i>(123) 456-7890</li>
                <li class="list-group-item"><i class="fas fa-calendar me-2"></i>Date d'inscription: <?= $user['date_inscrit'] ?></li>
            </ul>
            <a href="index.php?action=profil&id=<?= $user['Id_Utilisateur'] ?>" class="btn btn-primary">Check annonces</a>
        </div>
    </div>
</div>