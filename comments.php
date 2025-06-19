<?php
// Page d'administration - Modération des commentaires

?>

<div class="row mb-4">
    <div class="col-md-12">
        <h1>Modération des commentaires</h1>
        <p class="lead">Gérez les commentaires en attente de modération.</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-comments me-1"></i> Commentaires en attente
    </div>
    <div class="card-body">
        <?php if (empty($comments)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i> Aucun commentaire en attente de modération.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contenu</th>
                            <th>Auteur</th>
                            <th>Post</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td><?php echo $comment['id']; ?></td>
                                <td><?php echo htmlspecialchars(substr($comment['content'], 0, 100)) . (strlen($comment['content']) > 100 ? '...' : ''); ?></td>
                                <td><?php echo htmlspecialchars($comment['username']); ?></td>
                                <td>
                                    <a href="index.php?controller=post&action=view&id=<?php echo $comment['post_id']; ?>">
                                        <?php echo htmlspecialchars($comment['post_title']); ?>
                                    </a>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($comment['created_at'])); ?></td>
                                <td>
                                    <a href="index.php?controller=comment&action=approve&id=<?php echo $comment['id']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i> Approuver
                                    </a>
                                    <a href="index.php?controller=comment&action=delete&id=<?php echo $comment['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="index.php?controller=admin" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour au tableau de bord
        </a>
    </div>
</div>
