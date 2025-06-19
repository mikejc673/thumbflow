<?php
// Page de profil utilisateur
?>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">Profil</div>
            <div class="card-body text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Avatar">
                <h5 class="card-title"><?php echo htmlspecialchars($user->username ?? ''); ?></h5>
                <p class="card-text text-muted">
                    <i class="fas fa-envelope me-1"></i> <?php echo htmlspecialchars($user->email ?? ''); ?>
                </p>
                <p class="card-text text-muted">
                    <i class="fas fa-calendar me-1"></i> Membre depuis <?php echo isset($user->created_at) ? date('d/m/Y', strtotime($user->created_at)) : ''; ?>
                </p>
                
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == ($user->id ?? null)): ?>
                    <a href="#" class="btn btn-outline-primary btn-sm">Modifier mon profil</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <h2 class="mb-4">Posts de <?php echo htmlspecialchars($user->username); ?></h2>
        
        <?php if (empty($posts)): ?>
            <div class="alert alert-info">
                Cet utilisateur n'a pas encore publié de post.
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="index.php?controller=post&action=view&id=<?php echo $post['id']; ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h3>
                        <div class="card-text mb-3">
                            <?php 
                                // Limiter l'affichage du contenu à 150 caractères
                                $content = htmlspecialchars($post['content']);
                                echo strlen($content) > 150 ? substr($content, 0, 150) . '...' : $content;
                            ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i> <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                            </small>
                            <a href="index.php?controller=post&action=view&id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Lire la suite</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
