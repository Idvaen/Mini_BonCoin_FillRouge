<?php $this->titre = "Creation - Annonce"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Créer une annonce</h3>

                    <form action="index.php?action=create_annonce" method="post" enctype="multipart/form-data"
                        novalidate>
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" required
                                placeholder="Titre de l'annonce" minlength="5">
                            <small class="form-text text-muted">Minimum 5 caractères</small>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">-- Sélectionnez une catégorie --</option>
                                <option value="1">Véhicules</option>
                                <option value="2">Mode</option>
                                <option value="3">Électronique</option>
                                <option value="4">Autres</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required
                                placeholder="Décrivez votre article..." minlength="10"></textarea>
                            <small class="form-text text-muted">Minimum 10 caractères</small>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix (€)</label>
                            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required
                                placeholder="0.00" min="0">
                        </div>
                        <div class="mb-3">
                            <label for="annonce_img" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="annonce_img" name="annonce_img"
                                accept="image/png, image/jpeg">
                            <small class="form-text text-muted">Formats acceptés: PNG, JPEG</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-check me-2"></i>Créer l'annonce
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>