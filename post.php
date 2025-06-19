<?php
// Page d'affichage d'un post individuel
?>

<div class="row">
    <div class="col-md-8">
        <?php if (isset($_GET['comment_status']) && $_GET['comment_status'] == 'pending'): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Votre commentaire a été soumis et est en attente de modération.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <article>
            <h1 class="mb-3"><?php echo htmlspecialchars($post->title); ?></h1>
            
            <div class="mb-3 text-muted">
                <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($post->author); ?>
                <span class="mx-1">|</span>
                <i class="fas fa-calendar me-1"></i> <?php echo date('d/m/Y à H:i', strtotime($post->created_at)); ?>
            </div>
            
            <div class="mb-4">
                <?php echo nl2br(htmlspecialchars($post->content)); ?>
            </div>
            
            <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $post->user_id || isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)): ?>
                <div class="mb-4">
                    <a href="index.php?controller=post&action=edit&id=<?php echo $post->id; ?>" class="btn btn-outline-primary btn-sm me-2">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                    <a href="index.php?controller=post&action=delete&id=<?php echo $post->id; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?');">
                        <i class="fas fa-trash me-1"></i> Supprimer
                    </a>
                </div>
            <?php endif; ?>
        </article>
        
        <hr class="my-4">
        
        <section id="comments">
            <h3 class="mb-4"><?php echo count($comments); ?> Commentaire(s)</h3>
            
            <?php if (empty($comments)): ?>
                <div class="alert alert-info">
                    Aucun commentaire pour le moment.
                </div>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-subtitle text-muted">
                                    <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($comment['username']); ?>
                                </h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i> <?php echo date('d/m/Y à H:i', strtotime($comment['created_at'])); ?>
                                </small>
                            </div>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="card mt-4">
                    <div class="card-header">Ajouter un commentaire</div>
                    <div class="card-body">
                        <form action="index.php?controller=comment&action=create" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                            <div class="mb-3">
                                <label for="content" class="form-label">Votre commentaire</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                            <small class="form-text text-muted d-block mt-2">
                                Les commentaires sont soumis à modération avant publication.
                            </small>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info mt-4">
                    <a href="index.php?controller=user&action=login" class="alert-link">Connectez-vous</a> pour laisser un commentaire.
                </div>
            <?php endif; ?>
        </section>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">À propos de l'auteur</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post->author); ?></h5>
                <p class="card-text">Auteur de ce post et contributeur sur Thumbflow.</p>
                <a href="index.php?controller=user&action=profile&id=<?php echo $post->user_id; ?>" class="btn btn-outline-primary">Voir le profil</a>
            </div>
        </div>
    </div>
</div>
