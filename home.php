<?php
// Page d'accueil - Liste des posts
?>

<div class="row">
    <div class="col-md-8">
        <h1 class="mb-4">Derniers posts</h1>
        
        <?php if (empty($posts)): ?>
            <div class="alert alert-info">
                Aucun post n'a été publié pour le moment.
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title h4">
                            <a href="index.php?controller=post&action=view&id=<?php echo $post['id']; ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h2>
                        <div class="card-text mb-3">
                            <?php 
                                // Limiter l'affichage du contenu à 200 caractères
                                $content = htmlspecialchars($post['content']);
                                echo strlen($content) > 200 ? substr($content, 0, 200) . '...' : $content;
                            ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-muted">
                                <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($post['author']); ?>
                                <span class="mx-1">|</span>
                                <i class="fas fa-calendar me-1"></i> <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                            </div>
                            <a href="index.php?controller=post&action=view&id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Lire la suite</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">À propos</div>
            <div class="card-body">
                <p class="card-text">Bienvenue sur Thumbflow, une plateforme moderne pour partager vos idées et interagir avec la communauté.</p>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <div class="d-grid gap-2">
                        <a href="index.php?controller=user&action=login" class="btn btn-primary">Connexion</a>
                        <a href="index.php?controller=user&action=register" class="btn btn-outline-primary">Inscription</a>
                    </div>
                <?php else: ?>
                    <div class="d-grid">
                        <a href="index.php?controller=post&action=create" class="btn btn-primary">Créer un post</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
