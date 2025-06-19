<?php
// Page de connexion
include_once 'views/layouts/header.php';
include_once 'views/login.php';
include_once 'views/layouts/footer.php';

?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Connexion</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form action="index.php?controller=user&action=login" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
                
                <div class="mt-3 text-center">
                    <p>Vous n'avez pas de compte ? <a href="index.php?controller=user&action=register">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
