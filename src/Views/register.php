<?php $this->titre = "Creation - Utilisateur"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Inscription</h3>
                    
                    <?php if (isset($erreur)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?= htmlspecialchars($erreur) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="index.php?action=inscrit" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label">Pseudo</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="username" 
                                name="username" 
                                required
                                placeholder="Votre pseudo"
                                minlength="3"
                            >
                            <small class="form-text text-muted">Minimum 3 caractères</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                required
                                placeholder="exemple@email.com"
                            >
                            <small class="form-text text-muted">Entrez une adresse email valide</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                required
                                placeholder="••••••••"
                                minlength="4"
                            >
                            <small class="form-text text-muted">Minimum 4 caractères</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">S'inscrire</button>
                    </form>
                    
                    <div class="text-center">
                        <p>Déjà inscrit ? 
                            <a href="index.php?action=login">Se connecter</a>
                        </p>
                    </div>
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
    
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>