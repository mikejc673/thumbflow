<?php
// Page d'administration - Tableau de bord
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h1>Tableau de bord d'administration</h1>
        <p class="lead">Bienvenue dans l'interface d'administration de Thumbflow.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Utilisateurs</h5>
                        <h2 class="display-4"><?php echo $users_count; ?></h2>
                    </div>
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <a href="index.php?controller=admin&action=users" class="btn btn-light mt-3">Gérer les utilisateurs</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-success mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Posts</h5>
                        <h2 class="display-4"><?php echo $posts_count; ?></h2>
                    </div>
                    <i class="fas fa-file-alt fa-3x"></i>
                </div>
                <a href="index.php?controller=admin&action=posts" class="btn btn-light mt-3">Gérer les posts</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Commentaires en attente</h5>
                        <h2 class="display-4"><?php echo $pending_comments; ?></h2>
                    </div>
                    <i class="fas fa-comments fa-3x"></i>
                </div>
                <a href="index.php?controller=admin&action=comments" class="btn btn-light mt-3">Modérer les commentaires</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Actions rapides</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="index.php?controller=post&action=create" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus-circle me-2"></i> Créer un nouveau post
                    </a>
                    <a href="index.php?controller=admin&action=users" class="list-group-item list-group-item-action">
                        <i class="fas fa-user-plus me-2"></i> Ajouter un utilisateur
                    </a>
                    <a href="index.php?controller=admin&action=comments" class="list-group-item list-group-item-action">
                        <i class="fas fa-check-circle me-2"></i> Modérer les commentaires
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informations système</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Version PHP
                        <span class="badge bg-primary rounded-pill"><?php echo phpversion(); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Base de données
                        <span class="badge bg-success rounded-pill">MySQL</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Date du serveur
                        <span class="badge bg-info rounded-pill"><?php echo date('d/m/Y H:i'); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
